<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $types = Type::latest()->paginate($perPage);

        $type = new Type();

        return view('types.index', compact('types', 'type'));
    }

    public function search(Request $request)
    {
        $searchInput = $request->input('searchInput');

        $types = Type::where('name', 'like', "%$searchInput%")
            ->orWhere('capacity', 'like', "%$searchInput%")
            ->paginate(5);

        $type = new Type();

        if ($types->isEmpty()) {
            return back()->with('error', 'No se encontraron resultados para tu búsqueda.');
        } else {
            return view('types.index', compact('types', 'type'));
        }
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $types = Type::where('name', 'like', "%$query%")
            ->orWhere('capacity', 'like', "%$query%")
            ->limit(5)
            ->get();

        return view('types.search_results', compact('types'));
    }

    public function store(TypeRequest $request)
    {
        try {
            Type::create($request->validated());
            return redirect()->route('types.index')->with('success', 'Tipo Creado');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(Type $type)
    {
        return response()->json(['type' => $type]);
    }

    public function update(TypeRequest $request, string $id)
    {
        $type = Type::find($id);
        try {
            $type->update($request->validated());
            return redirect()->route('types.index')->with('updated', 'Tipo Actualizado');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function show(Type $type)
    {
        return response()->json(['type' => $type]);
    }

    public function destroy(string $id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect()->back()->with('deleted', 'Tipo Borrado');
    }
}
