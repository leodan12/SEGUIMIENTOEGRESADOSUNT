<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;

    public function publicacion() {
        
         return $this->hasMany(Egresado::class,'idegresado','id');
     }

     public function experiencialaboral() {
        
        return $this->hasMany(Experiencialaboral::class,'idegresado','id');
    }


}
