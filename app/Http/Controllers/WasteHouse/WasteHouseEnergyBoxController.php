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

    public function index(Request $request)
    {
        $wasteHouseEnergyBoxes = $this->wasteHouseEnergyBoxService->paginate(
            $request->get('page', 1),
            $request->get('per_page', 10),
            $request->get('with', [])
        );

        return $this->apiSuccess($wasteHouseEnergyBoxes, 'success');
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
