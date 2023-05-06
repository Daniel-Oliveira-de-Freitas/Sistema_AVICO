<?php

namespace App\Enums;

enum StatusType: string
{
        case Aguardando_aprovacao = 'aguardando_aprovacao';
        case Aprovado = 'aprovado';
        case Indeferido = 'indeferido';
}
