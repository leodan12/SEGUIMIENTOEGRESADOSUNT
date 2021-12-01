<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;




    
    public function egresado(){
        return $this->hasOne('App\Models\Egresado','id','idegresado');
    }
}
