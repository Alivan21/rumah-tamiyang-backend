<?php

namespace Database\Seeders;

use App\Commons\Constant\PermissionConstant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guardName = 'api';

        $permissions = [
            PermissionConstant::ROLE_CREATE,
            PermissionConstant::ROLE_LIST,
            PermissionConstant::ROLE_UPDATE,
            PermissionConstant::ROLE_DELETE,

            PermissionConstant::PERMISSION_CREATE,
            PermissionConstant::PERMISSION_LIST,
            PermissionConstant::PERMISSION_UPDATE,
            PermissionConstant::PERMISSION_DELETE,
            
            PermissionConstant::USER_CREATE,
            PermissionConstant::USER_LIST,
            PermissionConstant::USER_UPDATE,
            PermissionConstant::USER_DELETE,

            PermissionConstant::CAFE_CREATE,
            PermissionConstant::CAFE_LIST,
            PermissionConstant::CAFE_UPDATE,
            PermissionConstant::CAFE_DELETE,

            PermissionConstant::WASTE_HOUSE_CREATE,
            PermissionConstant::WASTE_HOUSE_LIST,
            PermissionConstant::WASTE_HOUSE_UPDATE,
            PermissionConstant::WASTE_HOUSE_DELETE,

            PermissionConstant::WORKSHOP_CREATE,
            PermissionConstant::WORKSHOP_LIST,
            PermissionConstant::WORKSHOP_UPDATE,
            PermissionConstant::WORKSHOP_DELETE,
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => $guardName
            ]);
        }
    }
}
