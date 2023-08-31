<?php

namespace Database\Seeders;

use \Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['guard_name' => 'api', 'name' => 'ADMIN']);
        Role::create(['guard_name' => 'api', 'name' => 'USER_CAFE']);
        Role::create(['guard_name' => 'api', 'name' => 'USER_WORKSHOP']);
        Role::create(['guard_name' => 'api', 'name' => 'USER_WASTE_HOUSE']);
    }
}
