<?php

namespace App\Http\Controllers;

use App\Commons\Traits\apiResponse;
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


    public function store(Request $request)
    {
        $workshopOilWaste = $this->workshopOilWasteService->createWorkshopOilWaste($request->all());

        return $this->apiSuccess($workshopOilWaste, 'success');
    }


    public function update(Request $request, $id)
    {
        $workshopOilWaste = $this->workshopOilWasteService->updateWorkshopOilWaste($request->all(), $id);

        return $this->apiSuccess($workshopOilWaste, 'success');
    }

    public function destroy($id)
    {
        $this->workshopOilWasteService->deleteWorkshopOilWaste($id);

        return $this->apiSuccess(null, 'success');
    }
}
