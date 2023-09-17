<?php

namespace App\Enums;

enum Authority: string
{
    case Administador = 'admin';
    case Associado = 'associado';
    case Voluntario = 'voluntario';
}
