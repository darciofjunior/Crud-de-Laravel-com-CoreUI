<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departamento;

class Pessoa extends Model
{
    protected $fillable = [
        'nome',
        'data_contratacao',
        'cargo',
        'salario',
        'ramal',
        'departamento_id',
    ];

    public $timestamps = false;

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }
}