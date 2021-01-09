<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model{
    protected $fillable = ['nome', 'user_id', 'categoria_id', 'criador', 'descricao', 'slug'];

    public function user(){
        return $this->belongsTo(User::class); // Pertence a
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class); // Pertence a
    }
}
