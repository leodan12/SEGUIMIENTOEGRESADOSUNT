<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    public function encuesta(){
        return $this->hasOne('App\Models\Encuesta','id','encuesta_id');
    }

    public function respuesta() {
        
        return $this->hasMany(Respuesta::class,'pregunta_id','id');
    }

}
