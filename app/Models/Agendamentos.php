<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    protected $table = "agendamento";
    
    protected $fillable = ["id_agendamento","data_agendada","id_dono","id_servico"];
    public $timestamps = false;
}
