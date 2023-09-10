<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workshop\CreateWorkshopExpenseRequest;
use App\Http\Requests\Workshop\UpdateWorkshopExpenseRequest;
use App\Http\Resources\Workshop\WorkshopExpense\WorkshopExpenseCollection;
use App\Http\Resources\Workshop\WorkshopExpense\WorkshopExpenseResource;
use App\Services\Workshop\WorkshopExpenseService;
use Illuminate\Http\Request;

class WorkshopExpenseController extends Controller
{
    use apiResponse;

    private WorkshopExpenseService $workshopExpenseService;

    public function __construct(WorkshopExpenseService $workshopExpenseService)
    {
        $this->workshopExpenseService = $workshopExpenseService;
    }

    public function index(Request $request)
    {
        $workshopExpense = $this->workshopExpenseService->getAllWorkshopExpense($request->page, $request->perPage);

        return $this->apiSuccess(new WorkshopExpenseCollection($workshopExpense), 'success');
    }

    public function store(CreateWorkshopExpenseRequest $request)
    {
        $workshopExpense = $this->workshopExpenseService->createWorkshopExpense($request->validated());

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function show($id)
    {
        $workshopExpense = $this->workshopExpenseService->getWorkshopExpenseById($id, ['workshopExpenseDescription']);

        return $this->apiSuccess(new WorkshopExpenseResource($workshopExpense), 'success');
    }

    public function update(UpdateWorkshopExpenseRequest $request, $id)
    {
        $workshopExpense = $this->workshopExpenseService->updateWorkshopExpense($request->validated(), $id);

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function destroy($id)
    {
        $this->workshopExpenseService->deleteWorkshopExpense($id);

        return $this->apiSuccess(null, 'success');
    }
}
