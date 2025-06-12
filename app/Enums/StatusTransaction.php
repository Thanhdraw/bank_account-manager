<?php

namespace App\Enums;

enum StatusTransaction: int
{
    //
    case Success = 10;
    case Fail = 20;
    case Pending = 30;

    public function label()
    {
        return match ($this) {
            self::Success => 'Giao dịch thành công',
            self::Fail => 'Giao dich thất bại',
            self::Pending => 'Đang giao dịch'
        };
    }

}