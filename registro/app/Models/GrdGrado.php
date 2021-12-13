<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AlmAlumno;

class GrdGrado extends Model
{
    //use HasFactory;
    protected $fillable = [
        'grd_nombre'
    ];

    public function alumnos()
    {
        return $this->hashMany(AlmAlumno::class,'id');
    }

    public function materias()
    {
        return $this->belongsToMany('App\Models\MatMateria', 'materias_grados')->withTimestamps();
    }

    public function getMateriaIds()
    {
        $ids = [];
        foreach ($this->materias as $materia) {
            $ids[] = $materia->id;
        }
        return $ids;
    }
    
    public function getMateriaTitles()
    {
        $titles = [];
        foreach ($this->materias as $materia) {
            $titles[] = $materia->mat_nombre;
        }
        return implode(', ', $titles);
    }
}
