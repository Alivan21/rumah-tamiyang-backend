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

//        $user_cafe = User::insert([
//            'name' => 'User Cafe',
//            'identifier' => 'user_cafe',
//            'email' => 'user_cafe@mail.com',
//            'password' => Hash::make('password'),
//            'role_id' => 2
//        ]);
//
//        $user_cafe->assignRole(RoleEnum::USER_CAFE);
//
//        $user_workshop = User::insert([
//            'name' => 'User Workshop',
//            'identifier' => 'user_workshop',
//            'email' => 'user_workshop@mail.com',
//            'password' => Hash::make('password'),
//            'role_id' => 3
//        ]);
//
//        $user_workshop->assignRole(RoleEnum::USER_WORKSHOP);
//
//        $user_waste_house =  User::insert([
//            'name' => 'User Waste House',
//            'identifier' => 'user_waste_house',
//            'email' => 'user_waste_house@mail.com',
//            'password' => Hash::make('password'),
//            'role_id' => 4
//        ]);
//
//        $user_waste_house->assignRole(RoleEnum::USER_WASTE_HOUSE);
    }
}
