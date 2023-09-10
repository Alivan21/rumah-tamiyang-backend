<?php

namespace App\Services\Admin;

use App\Contract\Admin\IAdminRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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

        return $this->adminRepository->create($data);
    }

    public function updateUser(array $data, int $id)
    {
        if (isset($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
        }

        return $this->adminRepository->update($data, $id);
    }

    public function deleteUser(int $id)
    {
        return $this->adminRepository->delete($id);
    }
}
