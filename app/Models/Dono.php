<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dono extends Model
{
    protected $table = "dono";
    
    protected $fillable = ["id_dono","nome","telefone","email","cidade","bairro","endereco"];
    public $timestamps = false;
}
