<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    public function pregunta() {
        
        return $this->hasMany(Pregunta::class,'encuesta_id','id');
    }

    public function egreencuesta() {
        
        return $this->hasMany(Egreencuesta::class,'encuesta_id','id');
    }

}
