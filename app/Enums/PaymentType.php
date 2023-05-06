<?php

namespace App\Enums;

enum PaymentType: string
{
        case Pix = 'pix';
        case Deposito = 'deposito';
}
