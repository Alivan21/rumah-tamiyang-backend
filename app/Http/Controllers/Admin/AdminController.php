<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
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

        return $this->apiSuccess($admin, 'success');
    }

    public function store(Request $request)
    {
        $admin = $this->adminService->createUser($request->all());

        return $this->apiSuccess($admin, 'success');
    }

    public function show($id)
    {
        $admin = $this->adminService->findUser($id);

        return $this->apiSuccess($admin, 'success');
    }

    public function update(Request $request, $id)
    {
        $admin = $this->adminService->updateUser($request->all(), $id);

        return $this->apiSuccess($admin, 'success');
    }

    public function destroy($id)
    {
        $this->adminService->deleteUser($id);

        return $this->apiSuccess(null, 'success');
    }
}
