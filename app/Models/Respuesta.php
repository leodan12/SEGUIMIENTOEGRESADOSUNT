<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public function pregunta(){
        return $this->hasOne('App\Models\Pregunta','id','pregunta_id');
    }

    public function egreencuesta(){
        return $this->hasOne('App\Models\Egreencuesta','id','egreencuesta_id');
    }
}
