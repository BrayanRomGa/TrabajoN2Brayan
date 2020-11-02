<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    protected $table ='comentarios';
 
    public function persona(){//cuaderno
        return $this->belongsTo(persona::class);
    }

    public function producto(){
        return $this->belongsTo(producto::class);
    }
}
