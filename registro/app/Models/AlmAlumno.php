<?php

namespace App\Models;
use App\Models\GrdGrado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmAlumno extends Model
{
    //use HasFactory;
    protected $fillable = [
        'alm_codigo' ,
        'alm_nombre' ,
        'alm_edad',
        'alm_sexo',
        'grd_id',
        'alm_observacion',
    ];


    public function grados(){ 
        return $this->belongsTo(GrdGrado::class, 'grd_id'); //Pertenece a un grado.
    }
}
