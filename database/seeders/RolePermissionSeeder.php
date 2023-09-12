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

            PermissionConstant::CAFE_LIST,
            PermissionConstant::CAFE_CREATE,
            PermissionConstant::CAFE_UPDATE,
            PermissionConstant::CAFE_DELETE,

            PermissionConstant::WASTE_HOUSE_LIST,
            PermissionConstant::WASTE_HOUSE_CREATE,
            PermissionConstant::WASTE_HOUSE_UPDATE,
            PermissionConstant::WASTE_HOUSE_DELETE,

            PermissionConstant::WORKSHOP_LIST,
            PermissionConstant::WORKSHOP_CREATE,
            PermissionConstant::WORKSHOP_UPDATE,
            PermissionConstant::WORKSHOP_DELETE,
        ]);

        $user_cafe = Role::findByName(RoleEnum::USER_CAFE->value);
        $user_cafe->givePermissionTo([
            PermissionConstant::CAFE_LIST,
            PermissionConstant::CAFE_CREATE,
            PermissionConstant::CAFE_UPDATE,
            PermissionConstant::CAFE_DELETE,
        ]);

        $user_waste_house = Role::findByName(RoleEnum::USER_WASTE_HOUSE->value);
        $user_waste_house->givePermissionTo([
            PermissionConstant::WASTE_HOUSE_LIST,
            PermissionConstant::WASTE_HOUSE_CREATE,
            PermissionConstant::WASTE_HOUSE_UPDATE,
            PermissionConstant::WASTE_HOUSE_DELETE,
        ]);

        $user_workshop = Role::findByName(RoleEnum::USER_WORKSHOP->value);
        $user_workshop->givePermissionTo([
            PermissionConstant::WORKSHOP_LIST,
            PermissionConstant::WORKSHOP_CREATE,
            PermissionConstant::WORKSHOP_UPDATE,
            PermissionConstant::WORKSHOP_DELETE,
        ]);
    }
}
