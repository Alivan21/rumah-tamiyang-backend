<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopExpenseDescriptionRequest;
use App\Http\Requests\Workshop\UpdateWorkshopExpenseDescriptionRequest;
use App\Services\Workshop\WorkshopExpenseDescriptionService;
use Illuminate\Http\Request;

class WorkshopExpenseDescriptionController extends Controller
{
    use apiResponse;

    private WorkshopExpenseDescriptionService $workshopExpenseDescriptionService;

    public function __construct(WorkshopExpenseDescriptionService $workshopExpenseDescriptionService)
    {
        $this->workshopExpenseDescriptionService = $workshopExpenseDescriptionService;
    }

    public function store(CreateWorkshopExpenseDescriptionRequest $request)
    {
        $workshopExpenseDescription = $this->workshopExpenseDescriptionService->createWorkshopExpenseDescription($request->validated());

        return $this->apiSuccess($workshopExpenseDescription, 'success');
    }

    public function update(UpdateWorkshopExpenseDescriptionRequest $request, $id)
    {
        $workshopExpenseDescription = $this->workshopExpenseDescriptionService->updateWorkshopExpenseDescription($request->validated(), $id);

        return $this->apiSuccess($workshopExpenseDescription, 'success');
    }

    public function destroy($id)
    {
        $this->workshopExpenseDescriptionService->deleteWorkshopExpenseDescription($id);

        return $this->apiSuccess(null, 'success');
    }
}
