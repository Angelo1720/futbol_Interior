<?php

namespace App\Enum;

use App\Enum\BaseEnum;

enum Divisionales: string {
  
    use BaseEnum;

    case DivA = 'Primera "A"';
    case DivB = 'Segunda "B"';
    case DivC = 'Tercera "C"';
}
