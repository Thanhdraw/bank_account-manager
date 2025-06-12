<?php

namespace App\Enums;

enum TypeTransaction: int
{
    //
    case deposit = 10;

    case withdraw = 20;

    public function label()
    {
        return match ($this) {
            self::deposit => 'Gửi tiền',
            self::withdraw => 'Rút tiền',
        };
    }
}