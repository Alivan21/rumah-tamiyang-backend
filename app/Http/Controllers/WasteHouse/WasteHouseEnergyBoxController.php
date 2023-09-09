<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WasteHouse\CreateWasteHouseEnergyBoxRequest;
use App\Http\Requests\WasteHouse\UpdateWasteHouseEnergyBoxRequest;
use App\Services\WasteHouse\WasteHouseEnergyBoxService;
use Illuminate\Http\Request;

class WasteHouseEnergyBoxController extends Controller
{
    use apiResponse;

    private WasteHouseEnergyBoxService $wasteHouseEnergyBoxService;

    public function __construct(WasteHouseEnergyBoxService $wasteHouseEnergyBoxService)
    {
        $this->wasteHouseEnergyBoxService = $wasteHouseEnergyBoxService;
    }

    public function store(CreateWasteHouseEnergyBoxRequest $request)
    {
        $wasteHouseEnergyBox = $this->wasteHouseEnergyBoxService->createWasteHouseEnergyBox($request->validated());

        return $this->apiSuccess($wasteHouseEnergyBox, 'success');
    }

    public function update(UpdateWasteHouseEnergyBoxRequest $request, $id)
    {
        $wasteHouseEnergyBox = $this->wasteHouseEnergyBoxService->updateWasteHouseEnergyBox($request->validated(), $id);

        return $this->apiSuccess($wasteHouseEnergyBox, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseEnergyBoxService->deleteWasteHouseEnergyBox($id);

        return $this->apiSuccess(null, 'success');
    }
}
