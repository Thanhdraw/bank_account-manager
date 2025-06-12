<?php

namespace App\Enums;

enum StatusAccount: int
{

    case Inactive = 10;

    case Active = 20;

    case Locked = 30;

    public function label(): string
    {
        return match ($this) {
            self::Inactive => 'Chưa kích hoạt',
            self::Active => 'Đang hoạt động',
            self::Locked => 'Bị khóa',
        };
    }

}