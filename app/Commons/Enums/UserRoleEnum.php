<?php

namespace App\Commons\Enums;

enum UserRoleEnum: int
{
    case MAHASISWA = 1;
    case DOSEN = 2;
    case ADMIN = 3;
}
