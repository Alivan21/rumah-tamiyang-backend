<?php

namespace App\Commons\Enums;

enum RoleEnum: string
{
    case MAHASISWA = "mahasiswa";
    case DOSEN = "dosen";
    case ADMIN = "admin";
}
