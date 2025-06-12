<?php

namespace App\Enums;

enum TypeAccount: int
{
    case Basic = 10;

    case Silver = 20;

    case Gold = 30;

    case Platinum = 40;

    public function lable()
    {
        return match ($this) {
            self::Basic => 'Tài khoản thường',
            self::Silver => ' Tài khoản bạc',
            self::Gold => 'Tài khoản vàng',
            self::Platinum => 'Tài khoản kim cương',
        };
    }

}