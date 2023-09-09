<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopSparepartRevenueRequest;
use App\Http\Requests\Workshop\UpdateWorkshopServiceDescriptionRequest;
use App\Services\Workshop\WorkshopSparepartRevenueService;
use Illuminate\Http\Request;

class WorkshopSparepartRevenueController extends Controller
{
    use apiResponse;

    private WorkshopSparepartRevenueService $workshopSparepartRevenueService;

    public function __construct(WorkshopSparepartRevenueService $workshopSparepartRevenueService)
    {
        $this->workshopSparepartRevenueService = $workshopSparepartRevenueService;
    }

    public function index(Request $request)
    {
        $workshopSparepartRevenues = $this->workshopSparepartRevenueService->getAllWorkshopSparepartRevenue($request->page, $request->perPage);

        return $this->apiSuccess($workshopSparepartRevenues, 'success');
    }

    public function show($id)
    {
        $workshopSparepartRevenue = $this->workshopSparepartRevenueService->getWorkshopSparepartRevenueByWorkshopId($id);

        return $this->apiSuccess($workshopSparepartRevenue, 'success');
    }

    public function store(CreateWorkshopSparepartRevenueRequest $request)
    {
        $workshopSparepartRevenue = $this->workshopSparepartRevenueService->createWorkshopSparepartRevenue($request->validated());

        return $this->apiSuccess($workshopSparepartRevenue, 'success');
    }

    public function update(UpdateWorkshopServiceDescriptionRequest $request, $id)
    {
        $workshopSparepartRevenue = $this->workshopSparepartRevenueService->updateWorkshopSparepartRevenue($request->validated(), $id);

        return $this->apiSuccess($workshopSparepartRevenue, 'success');
    }

    public function destroy($id)
    {
        $this->workshopSparepartRevenueService->deleteWorkshopSparepartRevenue($id);

        return $this->apiSuccess(null, 'success');
    }
}
