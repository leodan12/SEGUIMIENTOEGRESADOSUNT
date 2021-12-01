<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function ofertalaboral() {
        
        return $this->hasMany(Ofertalaboral::class,'idempresa','id');
    }

    public function experiencialaboral() {
        
        return $this->hasMany(Experiencialaboral::class,'idempresa','id');
    }


}
