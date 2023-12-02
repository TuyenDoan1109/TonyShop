<?php

namespace App\Enums;

enum UserStatusEnum: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public static function getAllValues(): array
    {
        return array_column(UserStatusEnum::cases(), 'value');
    }
}

