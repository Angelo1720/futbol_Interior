<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicion_Equipo extends Model
{
    use HasFactory;

    protected $table = 'edicion_equipo';

    protected $fillable = [
        'idEquipo',
        'idEdicion',
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $primarykey = ['idEquipo', 'idEdicion'];
    protected $casts = [
        'idEquipo' => 'integer',
        'idEdicion' => 'integer',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    public function ediciones()
    {
        return $this->hasMany(Edicion::class);
    }
}