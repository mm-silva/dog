<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";
    
    protected $fillable = ["id_client","client","token"];
    public $timestamps = false;
}
