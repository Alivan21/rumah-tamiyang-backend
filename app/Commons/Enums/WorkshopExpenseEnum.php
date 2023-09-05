<?php

namespace App\Commons\Enums;

enum WorkshopExpenseEnum: string
{
    case ELECTRICITY = "ELECTRICITY";
    case WATER = "WATER";
    case GAS = "GAS";
    case EQUIPMENT = "EQUIPMENT";
    case ETC = "ETC";
}
