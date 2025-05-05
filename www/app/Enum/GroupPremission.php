<?php

namespace App\Enum;

enum GroupPremission: string
{
    case USER = 'user';
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
}
