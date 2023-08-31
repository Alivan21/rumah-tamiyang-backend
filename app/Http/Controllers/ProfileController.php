<?php

namespace App\Http\Controllers;

use App\Commons\Traits\apiResponse;
use App\Http\Resources\User\AuthUserResource;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use apiResponse;
    /**
     * @return JsonResponseAlias
     */
    public function index()
    {
        $user = auth()->user();
        $user->load([]);
        $user->getAllPermissions();

        return $this->apiSuccess(new AuthUserResource($user), 'Ok', 200);
    }
}
