<?php

namespace Database\Seeders;

use App\Commons\Constant\PermissionConstant;
use App\Commons\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::findByName(RoleEnum::ADMIN->value);
        $admin->givePermissionTo([
            PermissionConstant::ROLE_CREATE,
            PermissionConstant::ROLE_UPDATE,
            PermissionConstant::ROLE_DELETE,
            PermissionConstant::ROLE_LIST,

            PermissionConstant::PERMISSION_LIST,
            PermissionConstant::PERMISSION_CREATE,
            PermissionConstant::PERMISSION_UPDATE,
            PermissionConstant::PERMISSION_DELETE,

            PermissionConstant::USER_LIST,
            PermissionConstant::USER_CREATE,
            PermissionConstant::USER_UPDATE,
            PermissionConstant::USER_DELETE,
        ]);
    }
}
