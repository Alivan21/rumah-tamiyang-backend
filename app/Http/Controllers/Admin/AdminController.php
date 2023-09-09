<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Resources\Admin\AdminCollection;
use App\Http\Resources\Admin\AdminResource;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use apiResponse;

    private AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        $admin = $this->adminService->getAllUser($request->page, $request->perPage);

        return $this->apiSuccess(new AdminCollection($admin), 'success');
    }

    public function store(CreateUserRequest $request)
    {
        $admin = $this->adminService->createUser($request->validated());

        return $this->apiSuccess(new AdminResource($admin), 'success');
    }

    public function show($id)
    {
        $admin = $this->adminService->findUser($id);

        return $this->apiSuccess(new AdminResource($admin), 'success');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $admin = $this->adminService->updateUser($request->validated(), $id);

        return $this->apiSuccess($admin, 'success');
    }

    public function destroy($id)
    {
        $this->adminService->deleteUser($id);

        return $this->apiSuccess(null, 'success');
    }
}
