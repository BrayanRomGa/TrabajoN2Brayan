<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $table ='personas';

    public function comentarios(){
        return $this->hasMany(comentario::class);
    }
}