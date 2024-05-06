<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = [
        'id',
        'nombreImg',
        'base64',
    ];
    protected $casts = [
        'id' => 'integer',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
