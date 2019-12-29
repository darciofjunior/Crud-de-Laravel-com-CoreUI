<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'departamento', 
        'andar', 
        'sala', 
        'objetivo', 
    ];

    public $timestamps = false;
}