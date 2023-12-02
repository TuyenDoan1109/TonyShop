<?php

namespace App\Enums;

enum GenderEnum:int
{
    case FEMALE = 0;
    case MALE = 1;

    public static function getAllValues(): array
    {
        return array_column(UserStatusEnum::cases(), 'value');
    }
}
