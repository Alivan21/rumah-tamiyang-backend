<?php

namespace App\Commons\Enums;

enum WorkshopServiceEnum: string
{
    case LIGHT_SERVICE = "LIGHT_SERVICE";
    case HEAVY_SERVICE = "HEAVY_SERVICE";
    case REPLACE_SPAREPART = "REPLACE_SPAREPART";
    case ETC = "ETC";
}
