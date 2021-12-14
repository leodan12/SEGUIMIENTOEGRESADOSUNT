<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreencuesta extends Model
{
    use HasFactory;

    public function egresado(){
        return $this->hasOne('App\Models\Egresado','id','egresado_id');
    }

    public function encuesta(){
        return $this->hasOne('App\Models\Encuesta','id','encuesta_id');
    }

    public function respuesta() {
        
        return $this->hasMany(Respuesta::class,'egreencuesta_id','id');
    }
    
}
