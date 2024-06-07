<?php

namespace App\Enum;

use App\Enum\BaseEnum;

enum Posiciones: string {
  
    use BaseEnum;

    case ARQ = 'Arquero';
    case DFC = 'Defensa central';
    case LI = 'Lateral izquierdo';
    case LD = 'Lateral derecho';
    case MC = 'Mediocampista';
    case MCD = 'Mediocampista defensivo';
    case MD = 'Mediocampista derecho';
    case MI = 'Mediocampista izquierdo';
    case MP = 'Mediapunta';
    case DC = 'Delantero centro';
    case EXI = 'Extremo izquierdo';
    case EXD = 'Extremo derecho';
}
