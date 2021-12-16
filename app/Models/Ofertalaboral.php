<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertalaboral extends Model
{
    use HasFactory;

    public function empresa(){
        return $this->hasOne('App\Models\Empresa','id','idempresa');
    }

}
