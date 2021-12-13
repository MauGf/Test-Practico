<?php

namespace App\Http\Controllers;
use App\Models\MatMateria;
use Illuminate\Http\Request;

class MatMateriaController extends Controller
{
    public function index(Request $request)
    {
        $materias = new MatMateria();
        
        $filter = $request->query('filter');
        
        if ($filter) {
            if (isset($filter['title'])) {
                $materias = $materias->where('title', 'like', '%' . $filter['title'] . '%');
            }
        }
        
        $materias = $materias->paginate(10);
        
        return view('materias.index', ['materias' => $materias]);
    }


    public function create()
    {
        return view('materias.add');
    }

   //Crear materias
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mat_nombre' => 'required|min:2|max:100',
        ]);
        
        $materias = MatMateria::create($validatedData);
        
        $request->session()->flash('status', 'Materia registrada con exito');
        
        return redirect('/materia/edit/' . $materias->id);
    }

    public function show($id)
    {
        $materias = MatMateria::findOrFail($id);
        return view('materias.view', ['materia' => $materias]);
    }

    public function edit($id)
    {
        $materias = MatMateria::findOrFail($id);
        return view('materias.edit', ['materias' => $materias]);
    }

    public function update(Request $request, $id)
    {
        $materia = MatMateria::findOrFail($id);
        
        $validatedData = $request->validate([
            'mat_nombre' => 'required',
        ]);
        
        $result = $materia->fill($validatedData)->save();
        
        $request->session()->flash('status', 'Se actualizo con exito');
        
        return redirect('/materia/edit/' . $materia->id);
    }

    public function destroy(Request $request, $id)
    {
        $materia = MatMateria::findOrFail($id);
        $grados = $materia->grados;
        
        foreach ($grados as $grado) {
            $grado->materias()->detach($materia->id);
        }
        $materia->delete();
        
        $request->session()->flash('status', 'Se borro la materia con exito');
        
        return redirect('/materias');
    }

}
