<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logros extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre_del_Logro', 'Rareza', 'user_id'];
    public $timestamps = false;

    public function users(){
        return $this->
        
        
        belongsToMany(User::class, 'logro_user', 'logro_id', 'user_id');
    }    

    public function quiz()
    {
        return $this->hasOne(QuizLogro::class);
    }
}
