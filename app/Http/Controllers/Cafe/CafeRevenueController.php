<?php

namespace App\Http\Controllers\Cafe;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\CreateCafeRevenueRequest;
use App\Http\Resources\Cafe\CafeRevenueResource;
use App\Services\CafeRevenueService;
use Illuminate\Http\Request;

class CafeRevenueController extends Controller
{
    use apiResponse;

    private $cafeRevenueService;

    public function __construct(CafeRevenueService $cafeRevenueService)
    {
        $this->cafeRevenueService = $cafeRevenueService;
    }

    public function store(CreateCafeRevenueRequest $request)
    {
        $cafeRevenue = $this->cafeRevenueService->createCafeRevenue($request->validated());

        return $this->apiSuccess(new CafeRevenueResource($cafeRevenue), 'success');
    }
}
