<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopServiceRevenueRequest;
use App\Http\Requests\Workshop\UpdateWorkshopServiceRevenueRequest;
use App\Http\Resources\Workshop\WorkshopService\WorkshopServiceRevenueCollection;
use App\Http\Resources\Workshop\WorkshopService\WorkshopServiceRevenueResource;
use App\Services\Workshop\WorkshopServiceRevenueService;
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
        $workshopServiceRevenues = $this->workshopServiceRevenueService->getAllWorkshopServiceRevenue($request, ['users']);

        return $this->apiSuccess(new WorkshopServiceRevenueCollection($workshopServiceRevenues), 'success');
    }

    public function show($id)
    {
        $workshopServiceRevenue = $this->workshopServiceRevenueService->getWorkshopServiceRevenueByWorkshopId($id,['workshopServiceDescriptions']);

        return $this->apiSuccess(new WorkshopServiceRevenueResource($workshopServiceRevenue), 'success');
    }

    public function store(CreateWorkshopServiceRevenueRequest $request)
    {
        try {
            $workshopServiceRevenue = $this->workshopServiceRevenueService->createWorkshopServiceRevenue($request->validated());

        } catch (\Exception $e) {

            return $this->apiError($e->getMessage(), 500);
        }

        return $this->apiSuccess($workshopServiceRevenue, 'success');
    }

    public function update(UpdateWorkshopServiceRevenueRequest $request, $id)
    {
        $workshopServiceRevenue = $this->workshopServiceRevenueService->updateWorkshopServiceRevenue($request->validated(), $id);

        return $this->apiSuccess($workshopServiceRevenue, 'success');
    }

    public function destroy($id)
    {
        $this->workshopServiceRevenueService->deleteWorkshopServiceRevenue($id);

        return $this->apiSuccess(null, 'success');
    }
}
