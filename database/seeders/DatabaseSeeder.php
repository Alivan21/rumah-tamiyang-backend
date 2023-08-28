<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'mahasiswa'],
            ['name' => 'dosen'],
            ['name' => 'admin'],
        ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
