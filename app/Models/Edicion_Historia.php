<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicion_Historia extends Model
{
    use HasFactory;

    protected $table = 'edicion_historia';

    protected $fillable = [
        'descripcion',
    ];

    public $timestamps = false;

    public function edicion()
    {
        return $this->hasOne(Edicion::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}