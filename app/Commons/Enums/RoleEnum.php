<?php

namespace App\Commons\Enums;

enum RoleEnum: string
{
    case USER_CAFE = "USER_CAFE";
    case USER_WORKSHOP = "USER_WORKSHOP";
    case USER_WASTE_HOUSE = "USER_WASTE_HOUSE";
    case ADMIN = "ADMIN";
}
