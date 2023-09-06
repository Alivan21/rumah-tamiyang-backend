<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Services\WasteHouse\WasteHouseWasteOilService;
use Illuminate\Http\Request;

class WasteHouseWasteOilController extends Controller
{
    use apiResponse;

    private WasteHouseWasteOilService $wasteHouseWasteOilService;

    public function __construct(WasteHouseWasteOilService $wasteHouseWasteOilService)
    {
        $this->wasteHouseWasteOilService = $wasteHouseWasteOilService;
    }


    public function store(Request $request)
    {
        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->createWasteHouseWasteOil($request->all());

        return $this->apiSuccess($wasteHouseWasteOil, 'success');
    }


    public function update(Request $request,$id)
    {
        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->updateWasteHouseWasteOil($request->all(), $id);

        return $this->apiSuccess($wasteHouseWasteOil, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseWasteOilService->deleteWasteHouseWasteOil($id);

        return $this->apiSuccess(null, 'success');
    }
}
