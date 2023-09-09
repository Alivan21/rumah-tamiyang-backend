<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WasteHouse\CreateWasteHouseOilWasteRequest;
use App\Http\Requests\WasteHouse\UpdateWasteHouseOilWasteRequest;
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


    public function store(CreateWasteHouseOilWasteRequest $request)
    {
        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->createWasteHouseWasteOil($request->validated());

        return $this->apiSuccess($wasteHouseWasteOil, 'success');
    }


    public function update(UpdateWasteHouseOilWasteRequest $request,$id)
    {
        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->updateWasteHouseWasteOil($request->validated(), $id);

        return $this->apiSuccess($wasteHouseWasteOil, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseWasteOilService->deleteWasteHouseWasteOil($id);

        return $this->apiSuccess(null, 'success');
    }
}
