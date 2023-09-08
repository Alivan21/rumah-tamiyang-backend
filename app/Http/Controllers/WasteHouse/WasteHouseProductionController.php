<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Services\WasteHouse\WasteHouseProductionService;
use Illuminate\Http\Request;

class WasteHouseProductionController extends Controller
{
    use apiResponse;

    private WasteHouseProductionService $wasteHouseProductionService;

    public function __construct(WasteHouseProductionService $wasteHouseProductionService)
    {
        $this->wasteHouseProductionService = $wasteHouseProductionService;
    }

    public function store(Request $request)
    {
        $wasteHouseProduction = $this->wasteHouseProductionService->createWasteHouseProduction($request->all());

        return $this->apiSuccess($wasteHouseProduction, 'success');
    }

    public function update(Request $request, $id)
    {
        $wasteHouseProduction = $this->wasteHouseProductionService->updateWasteHouseProduction($request->all(), $id);

        return $this->apiSuccess($wasteHouseProduction, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseProductionService->deleteWasteHouseProduction($id);

        return $this->apiSuccess(null, 'success');
    }
}
