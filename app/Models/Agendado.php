<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendado extends Model
{
    protected $table = "pet_agendado";
    
    protected $fillable = ["id_agendamento","id_pet"];
    public $timestamps = false;
}
