<?php

namespace App\Http\Controllers;

use App\Commons\Traits\apiResponse;
use App\Http\Requests\Workshop\CreateWorkshopOilWasteRequest;
use App\Http\Requests\Workshop\UpdateWorkshopOilWasteRequest;
use App\Services\Workshop\WorkshopOilWasteService;
use Illuminate\Http\Request;

class WorkshopOilWasteController extends Controller
{
    use apiResponse;

    private WorkshopOilWasteService $workshopOilWasteService;

    public function __construct(WorkshopOilWasteService $workshopOilWasteService)
    {
        $this->workshopOilWasteService = $workshopOilWasteService;
    }


    public function store(CreateWorkshopOilWasteRequest $request)
    {
        $workshopOilWaste = $this->workshopOilWasteService->createWorkshopOilWaste($request->validated());

        return $this->apiSuccess($workshopOilWaste, 'success');
    }


    public function update(UpdateWorkshopOilWasteRequest $request, $id)
    {
        $workshopOilWaste = $this->workshopOilWasteService->updateWorkshopOilWaste($request->validated(), $id);

        return $this->apiSuccess($workshopOilWaste, 'success');
    }

    public function destroy($id)
    {
        $this->workshopOilWasteService->deleteWorkshopOilWaste($id);

        return $this->apiSuccess(null, 'success');
    }
}
