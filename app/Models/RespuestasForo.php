<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestasForo extends Model
{
    use HasFactory;
    protected $table = 'respuestasforo';

    public function comentarios(){
        return $this->BelongsToMany(foro::class, );
    }
}
