<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopServiceDescriptionRequest;
use App\Http\Requests\Workshop\UpdateWorkshopServiceDescriptionRequest;
use App\Services\Workshop\WorkshopServiceDescriptionService;
use Illuminate\Http\Request;

class
WorkshopServiceDescriptionController extends Controller
{
    use apiResponse;

    private WorkshopServiceDescriptionService $workshopServiceDescriptionService;

    public function __construct(WorkshopServiceDescriptionService $workshopServiceDescriptionService)
    {
        $this->workshopServiceDescriptionService = $workshopServiceDescriptionService;
    }

    public function store(CreateWorkshopServiceDescriptionRequest $request)
    {
        $workshopServiceDescription = $this->workshopServiceDescriptionService->createWorkshopServiceDescription($request->validated());

        return $this->apiSuccess($workshopServiceDescription, 'success');
    }

    public function update(UpdateWorkshopServiceDescriptionRequest $request, $id)
    {
        $workshopServiceDescription = $this->workshopServiceDescriptionService->updateWorkshopServiceDescription($request->validated(), $id);

        return $this->apiSuccess($workshopServiceDescription, 'success');
    }

    public function destroy($id)
    {
        $this->workshopServiceDescriptionService->deleteWorkshopServiceDescription($id);

        return $this->apiSuccess(null, 'success');
    }
}
