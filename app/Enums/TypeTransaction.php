<?php

namespace App\Enums;

enum TypeTransaction: int
{
    //
    case Deposit = 10;

    case Withdraw = 20;

    public function label()
    {
        return match ($this) {
            self::Deposit => 'Gửi tiền',
            self::Withdraw => 'Rút tiền',
        };
    }
    public static function asSelectArray(): array
    {
        return [
            self::Deposit->value => self::Deposit->label(),
            self::Withdraw->value => self::Withdraw->label(),
        ];
    }
}