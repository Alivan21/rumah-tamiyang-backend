<?php

namespace App\Http\Controllers\Workshop;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
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

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function store(Request $request)
    {
        $workshopExpense = $this->workshopExpenseService->createWorkshopExpense($request->all());

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function show($id)
    {
        $workshopExpense = $this->workshopExpenseService->getWorkshopExpenseById($id);

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function update(Request $request, $id)
    {
        $workshopExpense = $this->workshopExpenseService->updateWorkshopExpense($request->all(), $id);

        return $this->apiSuccess($workshopExpense, 'success');
    }

    public function destroy($id)
    {
        $this->workshopExpenseService->deleteWorkshopExpense($id);

        return $this->apiSuccess(null, 'success');
    }
}
