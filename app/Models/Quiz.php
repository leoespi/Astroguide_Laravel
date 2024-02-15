<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizs";

    protected $fillable = [
        "Titulo",
        "Duracion",
        "Pregunta",
        "RespuestaCorrecta",
        "Respuesta2",
        "Respuesta3",
        "Respuesta4",
    ];

    public $timestamps = false;

    public function leccion()
    {
        return $this->hasOne(Lecciones::class);
    }

    public function logro()
    {
        return $this->hasOne(Logros::class);
    }
}
