<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmAlumno;
use App\Models\GrdGrado;



class AlmAlumnoController extends Controller
{
    public function index(Request $request)
    {
        $alumnos = new AlmAlumno();
        
        $filter = $request->query('filter');
        
        if ($filter) {
            if (isset($filter['alm_nombre'])) {
                $alumnos = $alumnos->where('alm_nombre', 'like', '%' . $filter['alm_nombre'] . '%');
            }
        }
        
        $alumnos = $alumnos->with('grados')->get();
        
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $alumnos = AlmAlumno::get();
        $grados =  GrdGrado::all();
        
        return view('alumnos.add', compact('alumnos','grados'));
    }

    //Crear 
    public function store(Request $request)
    {
        $input = $request->input();
        
        $validatedData = $request->validate([
            'alm_codigo'=> 'required',
            'alm_nombre'=> 'required',
            'alm_edad'=> 'required',
            'alm_sexo'=> 'required',
            'grd_id'=> 'required',
            'alm_observacion'=> 'nullable',
        ]);
        
        $alumno = AlmAlumno::create($validatedData);
        
        
        $request->session()->flash('status', 'Se creo con exito');
        
        return redirect('/alumno/edit/' . $alumno->id);
    }

    public function show($id)
    {
        $alumno = Almalumno::findOrFail($id);
        return view('alumnos.view', ['alumno' => $alumno]);
    }

    public function edit($id)
    {
        $alumno = AlmAlumno::findOrFail($id);
        $grados =  GrdGrado::all();
        return view('alumnos.edit', compact('alumno','grados'));
    }
    
    public function update(Request $request, $id)
    {
        $alumno = AlmAlumno::findOrFail($id);
        
        $validatedData = $request->validate([
            'alm_codigo'=> 'required',
            'alm_nombre'=> 'required',
            'alm_edad'=> 'required',
            'alm_sexo'=> 'required',
            'grd_id'=> 'required',
            'alm_observacion'=> 'nullable',
        ]);
        
        $result = $alumno->fill($validatedData)->save();
        
        $request->session()->flash('status', 'Se actualizo con exito');
        
        return redirect('/alumno/edit/' . $alumno->id);
    }

    public function destroy(Request $request, $id)
    {
        $alumno = AlmAlumno::findOrFail($id);
        $alumno->delete();
        
        $request->session()->flash('status', 'Se borro con exito');
        
        return redirect('/alumnos');
    }


}
