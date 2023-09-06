<?php

namespace Database\Seeders;

use App\Commons\Enums\RoleEnum;
use App\Commons\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::query()->firstOrCreate([
            'name' => 'Admin',
            'identifier' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        $role_admin = Role::query()->where('name', RoleEnum::ADMIN->value)->first();
        $userAdmin->assignRole($role_admin);
        $userAdmin->save();

        $user_cafe = User::query()->firstOrCreate([
            'name' => 'User Cafe',
            'identifier' => 'user_cafe',
            'email' => 'user_cafe@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        $role_cafe = Role::query()->where('name', RoleEnum::USER_CAFE->value)->first();
        $user_cafe->assignRole($role_cafe);
        $user_cafe->save();

        $user_workshop = User::query()->firstOrCreate([
            'name' => 'User Workshop',
            'identifier' => 'user_workshop',
            'email' => 'user_workshop@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);
        $role_workshop = Role::query()->where('name', RoleEnum::USER_WORKSHOP->value)->first();
        $user_workshop->assignRole($role_workshop);
        $user_workshop->save();

        $user_waste_house =  User::query()->firstOrCreate([
            'name' => 'User Waste House',
            'identifier' => 'user_waste_house',
            'email' => 'user_waste_house@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 4
        ]);
        $role_waste_house = Role::query()->where('name', RoleEnum::USER_WASTE_HOUSE->value)->first();
        $user_waste_house->assignRole($role_waste_house);
        $user_waste_house->save();
    }
}
