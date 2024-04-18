<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignmentRequest;
use App\Models\Assignment;
use App\Models\Table;
use App\Models\User;
use App\Models\Client;
use App\Models\Invoice;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('table', 'client', 'user')->paginate(5);
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $assignment = new Assignment();
        $user = new User();
        $client = new Client();
        $client->user()->associate($user);

        $tables = Table::available()->get();
        return view('assignments.create', compact('assignment', 'tables', 'user', 'client'));
    }

    public function store(AssignmentRequest $request)
    {
        $assignment = $this->createAssignment($request);
        $this->updateTableStatus($request->table_id);
        $this->createInvoice($request->assignment_type, $assignment);

        return redirect()->route('assignments.index')->with('success', 'Asignación Registrada');
    }

    private function createAssignment(AssignmentRequest $request)
    {
        $assignment = new Assignment();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
        ]);

        $registerDate = now()->toDateString();
        $registerTime = now()->toTimeString();

        $assignment->fill($request->validated() + [
            'client_id' => $client->id,
            'register_date' => $registerDate,
            'register_time' => $registerTime,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->assignment_type == 'asignar') {
            $assignment->state = 'cancelada';
        } elseif ($request->assignment_type == 'reservar') {
            $assignment->state = 'pendiente';
            // Set reservation date and time
            $assignment->reservation_date = $request->reservation_date;
            $assignment->reservation_time = $request->reservation_time;
        }

        $assignment->save();

        return $assignment;
    }

    private function updateTableStatus($tableId)
    {
        $table = Table::findOrFail($tableId);
        $table->update([
            'status' => 'reservada',
        ]);
    }

    private function createInvoice($assignmentType, $assignment)
    {
        $invoice = new Invoice();

        if ($assignmentType == 'reservar') {
            $price = $assignment->table->type->unit_price;
            $Iva = 0.15;
            $totalAmmount = $price + ($price * $Iva);

            $details = 'Reserva de Mesa';
        } elseif ($assignmentType == 'asignar') {
            $totalAmmount = 0;
            $details = 'Asignación de Mesa';
        }

        $invoice->create([
            'total_ammount' => $totalAmmount,
            'details' => $details,
            'client_id' => $assignment->client_id,
            'assignment_id' => $assignment->id,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function edit(string $id)
    {
        $assignment = Assignment::find($id);
        $client = $assignment->client;
        $client->load('user');
        $tables = Table::all();
        return view('assignments.edit', compact('assignment', 'tables', 'client'));
    }

    public function update(AssignmentRequest $request, Assignment $assignment)
    {
        $user = User::findOrFail($assignment->client->user->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $client = Client::findOrFail($assignment->client->id);
        $client->update([
            'phone' => $request->phone,
        ]);

        $tableId = $request->table_id;
        $assignment->update($request->validated() + [
            'client_id' => $client->id,
            'user_id' => auth()->user()->id,
        ]);

        $table = Table::findOrFail($tableId);
        $table->update([
            'status' => 'reservada',
        ]);

        if ($request->assignment_type == 'reservar') {
            $invoice = Invoice::where('assignment_id', $assignment->id)->first();

            $price = $table->type->unit_price;
            $Iva = 0.15;

            $totalAmmount = $price + ($price * $Iva);

            $invoice->update([
                'total_ammount' => $totalAmmount,
                'unit_price' => $price,
                'details' => 'Reserva de Mesa',
                'client_id' => $client->id,
                'user_id' => auth()->user()->id,
            ]);
        } elseif ($request->assignment_type == 'asignar') {
            $invoice = Invoice::where('assignment_id', $assignment->id)->first();

            $invoice->update([
                'total_ammount' => 0,
                'unit_price' => 0,
                'details' => 'Asignación de Mesa',
                'client_id' => $client->id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->route('assignments.index')->with('success', 'Asignación Actualizada');
    }

    public function show(string $id)
    {
        $assignment = Assignment::with('user', 'client', 'table')->find($id);
        return view('assignments.show', compact('assignment'));
    }

    public function destroy(string $id)
    {
        $assignment = Assignment::findOrFail($id);

        $tableId = $assignment->table->id;
        $table = Table::find($tableId);

        $table->update([
            'status' => 'disponible'
        ]);

        $assignment->delete();
        return redirect()->route('assignments.index')->with('deleted', 'Asignación Eliminada');
    }
}
