<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WasteHouse\CreateWasteHouseProductionRequest;
use App\Http\Requests\WasteHouse\UpdateWasteHouseProductionRequest;
use App\Http\Resources\WasteHouse\WasteHouseProductionCollection;
use App\Http\Resources\WasteHouse\WasteHouseProductionResource;
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

    public function index(Request $request)
    {
        $wasteHouseProductions = $this->wasteHouseProductionService->paginate($request->page, $request->perPage);

        return $this->apiSuccess(new WasteHouseProductionCollection($wasteHouseProductions), 'success');
    }

    public function show($id)
    {
        $wasteHouseProduction = $this->wasteHouseProductionService->findWasteHouseProduction($id);

        return $this->apiSuccess(new WasteHouseProductionResource($wasteHouseProduction), 'success');
    }

    public function store(CreateWasteHouseProductionRequest $request)
    {
        $wasteHouseProduction = $this->wasteHouseProductionService->createWasteHouseProduction($request->validated());

        return $this->apiSuccess($wasteHouseProduction, 'success');
    }

    public function update(UpdateWasteHouseProductionRequest $request, $id)
    {
        $wasteHouseProduction = $this->wasteHouseProductionService->updateWasteHouseProduction($request->validated(), $id);

        return $this->apiSuccess($wasteHouseProduction, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseProductionService->deleteWasteHouseProduction($id);

        return $this->apiSuccess(null, 'success');
    }
}
