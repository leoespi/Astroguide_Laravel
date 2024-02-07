<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecciones extends Model
{
    use HasFactory;
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
