<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $table = 'campeonatos';

    protected $fillable = [
        'nombre',
        'division',
        'tipoCampeonato'
    ];

    public $timestamps = false;

    public function ediciones()
    {
        return $this->hasMany(Edicion::class);
    }
}