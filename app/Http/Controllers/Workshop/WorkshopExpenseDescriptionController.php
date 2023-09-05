<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $workshopExpenseDescription = $this->workshopExpenseDescriptionService->createWorkshopExpenseDescription($request->all());

        return $this->apiSuccess($workshopExpenseDescription, 'success');
    }

    public function update(Request $request, $id)
    {
        $workshopExpenseDescription = $this->workshopExpenseDescriptionService->updateWorkshopExpenseDescription($request->all(), $id);

        return $this->apiSuccess($workshopExpenseDescription, 'success');
    }

    public function destroy($id)
    {
        $this->workshopExpenseDescriptionService->deleteWorkshopExpenseDescription($id);

        return $this->apiSuccess(null, 'success');
    }
}
