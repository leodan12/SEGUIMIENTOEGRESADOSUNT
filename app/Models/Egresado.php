<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;

    public function publicacion() {
        
         return $this->hasMany(Publicacion::class,'idegresado','id');
     }

     public function experiencialaboral() {
        
        return $this->hasMany(Experiencialaboral::class,'idegresado','id');
    }

    public function usuario(){
        return $this->hasOne('App\Models\User','id','idusuario');
    }


    public function egreencuesta() {
        
        return $this->hasMany(EgreEncuesta::class,'egresado_id','id');
    }


}
