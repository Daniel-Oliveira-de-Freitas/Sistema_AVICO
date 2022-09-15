<?php

namespace App\Enums;

enum PaymentTypes: string
{
        case Pix = 'pix';
        case Deposito = 'deposito';
}