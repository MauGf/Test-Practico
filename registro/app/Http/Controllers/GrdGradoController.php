<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrdGrado;
use App\Models\MatMateria;

class GrdGradoController extends Controller
{
    public function index(Request $request)
    {
        $grados = new GrdGrado();
        
        $filter = $request->query('filter');
        
        if ($filter) {
            if (isset($filter['title'])) {
                $grados = $grados->where('title', 'like', '%' . $filter['title'] . '%');
            }
        }
        
        $grados = $grados->with('materias')->paginate(10);
        
        return view('grados.index', ['grados' => $grados]);
    }


    public function create()
    {
        $materias = MatMateria::get();
        
        return view('grados.add', ['materias' => $materias]);
    }

    //Crear 
    public function store(Request $request)
    {
        $input = $request->input();
        
        $validatedData = $request->validate([
            'grd_nombre' => 'required',
            
        ]);
        
        $grado = GrdGrado::create($validatedData);
        
        if (isset($input['mat_materia_id'])) {
            $materiaIds = [];

            foreach ($input['mat_materia_id'] as $materiaid) {
                $materiaIds[] = $materiaid;
            }

            $grado->materias()->sync($materiaIds);
        }
        
        $request->session()->flash('status', 'Grado se agrego con exito');
        
        return redirect('/grado/edit/' . $grado->id);
    }

    public function show($id)
    {
        $grado = GrdGrado::findOrFail($id);
        return view('grados.view', ['grado' => $grado]);
    }

    public function edit($id)
    {
        $grado = GrdGrado::findOrFail($id);
        
        $materias = MatMateria::get();
        
        return view('grados.edit', [
            'grados' => $grado,
            'materias' => $materias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grado = GrdGrado::findOrFail($id);
        
        $validatedData = $request->validate([
            'grd_nombre' => 'required',
            
        ]);
        
        $result = $grado->fill($validatedData)->save();
        
        $input = $request->input();
        
        if (isset($input['mat_materia_id'])) {
            $materiaIds  = [];

            foreach ($input['mat_materia_id'] as $materiaid) {
                $materiaIds [] = $materiaid;
            }

            $grado->materias()->sync($materiaIds );
        } else {
            $grado->materias()->sync([]);
        }
        
        $request->session()->flash('status', 'Se actualizo con exito');
        
        return redirect('/grado/edit/' . $grado->id);
    }

    public function destroy(Request $request, $id)
    {
        $grado = GrdGrado::findOrFail($id);
        
        $grado->materias()->sync([]);
        $grado->delete();
        
        $request->session()->flash('status', 'Se borro con exito');
        
        return redirect('/grados');
    }


}
