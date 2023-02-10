<?php

namespace App\Enums;

enum StatusTypes: string
{
        case Aguardando_aprovacao = 'aguardando_aprovacao';
        case Aprovado = 'aprovado';
        case Indeferido = 'indeferido';
}
