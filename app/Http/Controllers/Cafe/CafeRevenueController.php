<?php

namespace App\Http\Controllers\Cafe;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\CreateCafeRevenueRequest;
use App\Http\Requests\Cafe\UpdateCafeRevenueRequest;
use App\Http\Resources\Cafe\CafeRevenueResource;
use App\Services\CafeRevenueService;
use Illuminate\Http\Request;

class CafeRevenueController extends Controller
{
    use apiResponse;

    private CafeRevenueService $cafeRevenueService;

    public function __construct(CafeRevenueService $cafeRevenueService)
    {
        $this->cafeRevenueService = $cafeRevenueService;
    }

    public function index(Request $request)
    {
        $cafeRevenues = $this->cafeRevenueService->allCafeRevenue($request->page, $request->perPage);

        return $this->apiSuccess(CafeRevenueResource::collection($cafeRevenues), 'success');
    }

    public function show($id)
    {
        $cafeRevenue = $this->cafeRevenueService->showCafeRevenue($id);

        return $this->apiSuccess(new CafeRevenueResource($cafeRevenue), 'success');
    }

    public function store(CreateCafeRevenueRequest $request)
    {
        $cafeRevenue = $this->cafeRevenueService->createCafeRevenue($request->validated());

        return $this->apiSuccess(new CafeRevenueResource($cafeRevenue), 'success');
    }

    public function update(UpdateCafeRevenueRequest $request, $id)
    {
        $cafeRevenue = $this->cafeRevenueService->updateCafeRevenue($request->validated(), $id);

        return $this->apiSuccess(new CafeRevenueResource($cafeRevenue), 'success');
    }

    public function destroy($id)
    {
        $this->cafeRevenueService->deleteCafeRevenue($id);

        return $this->apiSuccess(null, 'success');
    }
}
