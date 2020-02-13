<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $table = "servico_pet";
    
    protected $fillable = ["id_servico","tipo_servico","descricao","valor"];
    public $timestamps = false;
}
