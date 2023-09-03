<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopServiceRevenueRequest;
use App\Services\Workshop\WorkshopServiceRevenueService;
use App\Services\WorkshopServiceService;
use Illuminate\Http\Request;

class WorkshopServiceRevenueController extends Controller
{
    use apiResponse;

    private WorkshopServiceRevenueService $workshopServiceRevenueService;

    public function __construct(WorkshopServiceRevenueService $workshopServiceRevenueService)
    {
        $this->workshopServiceRevenueService = $workshopServiceRevenueService;
    }

    public function index(Request $request)
    {
        $workshopServiceRevenues = $this->workshopServiceRevenueService->getAllWorkshopServiceRevenue($request->page, $request->perPage);

        return $this->apiSuccess($workshopServiceRevenues, 'success');
    }

    public function show($id)
    {
        $workshopServiceRevenue = $this->workshopServiceRevenueService->getWorkshopServiceRevenueByWorkshopId($id);

        return $this->apiSuccess($workshopServiceRevenue, 'success');
    }

    public function store(CreateWorkshopServiceRevenueRequest $request)
    {
        $workshopServiceRevenue = $this->workshopServiceRevenueService->createWorkshopServiceRevenue($request->validated());

        return $this->apiSuccess($workshopServiceRevenue, 'success');
    }

    public function update(Request $request, $id)
    {
        $workshopServiceRevenue = $this->workshopServiceRevenueService->updateWorkshopServiceRevenue($request->all(), $id);

        return $this->apiSuccess($workshopServiceRevenue, 'success');
    }

    public function destroy($id)
    {
        $this->workshopServiceRevenueService->deleteWorkshopServiceRevenue($id);

        return $this->apiSuccess(null, 'success');
    }
}
