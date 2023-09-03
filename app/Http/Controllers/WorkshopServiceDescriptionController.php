<?php

namespace App\Http\Controllers;

use App\Commons\Traits\apiResponse;
use App\Services\Workshop\WorkshopServiceDescriptionService;
use Illuminate\Http\Request;

class WorkshopServiceDescriptionController extends Controller
{
    use apiResponse;

    private WorkshopServiceDescriptionService $workshopServiceDescriptionService;

    public function __construct(WorkshopServiceDescriptionService $workshopServiceDescriptionService)
    {
        $this->workshopServiceDescriptionService = $workshopServiceDescriptionService;
    }

    public function store(Request $request)
    {
        $workshopServiceDescription = $this->workshopServiceDescriptionService->createWorkshopServiceDescription($request->all());

        return $this->apiSuccess($workshopServiceDescription, 'success');
    }

    public function update(Request $request, $id)
    {
        $workshopServiceDescription = $this->workshopServiceDescriptionService->updateWorkshopServiceDescription($request->all(), $id);

        return $this->apiSuccess($workshopServiceDescription, 'success');
    }

    public function destroy($id)
    {
        $this->workshopServiceDescriptionService->deleteWorkshopServiceDescription($id);

        return $this->apiSuccess(null, 'success');
    }
}
