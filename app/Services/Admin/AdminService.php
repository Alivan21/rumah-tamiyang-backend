<?php

namespace App\Services\Admin;

use App\Commons\Enums\RoleEnum;
use App\Contract\Admin\IAdminRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role;

class AdminService
{
    private IAdminRepository $adminRepository;

    public function __construct(IAdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAllUser(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->adminRepository->paginate($page, $perPage, $with);
    }

    public function findUser(int $id)
    {
        return $this->adminRepository->find($id);
    }

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);



        $user =  $this->adminRepository->create($data);

        $this->assignRole($user, $data['role_id']);

        return $user->fresh();
    }

    public function updateUser(array $data, int $id)
    {
        if (isset($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
        }

        if (isset($data['role_id']))
        {
            $user = $this->adminRepository->find($id);
            $user->removeRole(RoleEnum::ADMIN->value);
            $user->removeRole(RoleEnum::USER_CAFE->value);
            $user->removeRole(RoleEnum::USER_WORKSHOP->value);
            $user->removeRole(RoleEnum::USER_WASTE_HOUSE->value);
            $this->assignRole($user, $data['role_id']);
        }

        return $this->adminRepository->update($data, $id);
    }

    public function deleteUser(int $id)
    {
        return $this->adminRepository->delete($id);
    }

    private function assignRole($user, $role_id)
    {
        if ($role_id == 1)
        {
            $role_admin = Role::query()->where('name', RoleEnum::ADMIN->value)->first();
            $user->assignRole($role_admin);
        }

        if ($role_id == 2)
        {
            $role_cafe = Role::query()->where('name', RoleEnum::USER_CAFE->value)->first();
            $user->assignRole($role_cafe);
        }

        if ($role_id == 3)
        {
            $role_workshop = Role::query()->where('name', RoleEnum::USER_WORKSHOP->value)->first();
            $user->assignRole($role_workshop);
        }

        if ($role_id == 4)
        {
            $role_waste_house = Role::query()->where('name', RoleEnum::USER_WASTE_HOUSE->value)->first();
            $user->assignRole($role_waste_house);
        }

        return $user;
    }
}
