<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = "pet";
    
    protected $fillable = ["id_pet","nome_pet","idade_pet","peso","tipo","raca","foto_pet","primeira_visita","ultima_visita","id_dono"];
    public $timestamps = false;
    
}
