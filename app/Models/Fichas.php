<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fichas extends Model
{
    protected $table = "fichas";
    
    protected $fillable = ["id","pet_nome","pet_idade","pet_peso","tipo","raça","nome_dono","telefone","primeira_visita","ultima_visita","imagem","tipo_visita","data_agn"];
    public $timestamps = false;
}
