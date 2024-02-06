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
        "Respuesta1",
        "Respuesta2",
        "Respuesta3",
        "Respuesta4",
    ];

    public $timestamps = false;
}
