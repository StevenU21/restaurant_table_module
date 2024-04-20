<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Table;
use App\Models\Type;
use Exception;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::with('type')->paginate(5);
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        $table = new Table();
        $types = Type::all();
        return view('tables.create', compact('table', 'types'));
    }

    public function store(TableRequest $request)
    {
        $table = new Table();
        $lastTableNumber = Table::max('table_number');
        if ($lastTableNumber) {
            $lastLetter = substr($lastTableNumber, 0, 1);
            $lastNumber = substr($lastTableNumber, 1);
            if ($lastNumber < 9) {
                $newTableNumber = $lastLetter . ($lastNumber + 1);
            } else {
                $newTableNumber = chr(ord($lastLetter) + 1) . '1';
            }
        } else {
            $newTableNumber = 'A1';
        }

        try {
            $table->fill([
                'table_number' => $newTableNumber,
                'type_id' => $request->type_id,
                'status' => $request->status
            ]);
            $table->save();
            return redirect()->route('tables.index')->with('success', 'Mesa Registrada');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(Table $table)
    {
        $types = Type::all();
        return view('tables.edit', compact('table', 'types'));
    }

    public function update(TableRequest $request, string $id)
    {
        $table = Table::find($id);

        try {
            $table->update([
                'type_id' => $request->type_id,
                'status' => $request->status
            ]);
            return redirect()->route('tables.index')->with('updated', 'Mesa Actualizada');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function show(Table $table)
    {
        $table->load('type');
        return view('tables.show', compact('table'));
    }

    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect()->route('tables.index')->with('deleted', 'Mesa Borrada');
    }

    public function release(string $id)
    {
        $table = Table::find($id);

        if ($table->status === 'disponible') {
            return redirect()->route('tables.index')->with('error', 'La mesa ya está disponible');
        } else {
            $table->status = 'disponible';
            $table->save();
        }
        return redirect()->route('tables.index')->with('released', 'Mesa Liberada');
    }
}
