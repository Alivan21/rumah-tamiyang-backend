<?php

namespace Database\Seeders;

use App\Commons\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
            'name' => 'Admin',
            'identifier' => 'admin',
            'email' => 'admin@polinema.ac.id',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]]);

        User::insert([[
            'name' => 'Dosen',
            'identifier' => 'dosen',
            'email' => 'dosen@polinema.ac.id',
            'password' => Hash::make('password'),
            'role_id' =>2
        ]]);

        User::insert([[
            'name' => 'Mahasiswa',
            'identifier' => 'mahasiswa',
            'email' => 'mahasiswa@polinema.ac.id',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]]);

    }
}
