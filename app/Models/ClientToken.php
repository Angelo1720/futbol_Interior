<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken;

class ClientToken extends PersonalAccessToken
{
    use HasFactory;
}
