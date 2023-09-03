<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Services\Workshop\WorkshopSparepartDescriptionService;
use Illuminate\Http\Request;

class WorkshopSparepartsDescriptionController extends Controller
{
    use apiResponse;
    private WorkshopSparepartDescriptionService $workshopSparepartDescriptionService;

    public function __construct(WorkshopSparepartDescriptionService $workshopSparepartDescriptionService)
    {
        $this->workshopSparepartDescriptionService = $workshopSparepartDescriptionService;
    }

    public function store(Request $request)
    {
        $workshopSparepartDescription = $this->workshopSparepartDescriptionService->createWorkshopSparepartDescription($request->all());

        return $this->apiSuccess($workshopSparepartDescription, 'success');
    }

    public function update(Request $request, $id)
    {
        $workshopSparepartDescription = $this->workshopSparepartDescriptionService->updateWorkshopSparepartDescription($request->all(), $id);

        return $this->apiSuccess($workshopSparepartDescription, 'success');
    }

    public function destroy($id)
    {
        $this->workshopSparepartDescriptionService->deleteWorkshopSparepartDescription($id);

        return $this->apiSuccess(null, 'success');
    }
}
