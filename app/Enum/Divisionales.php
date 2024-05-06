<?php

namespace App\Enum;

use App\Enum\BaseEnum;

enum Divisionales: string {
  
    use BaseEnum;

    case DivA = 'Divisional "A"';
    case DivB = 'Divisional "B"';
    case DivC = 'Divisional "C"';
}
