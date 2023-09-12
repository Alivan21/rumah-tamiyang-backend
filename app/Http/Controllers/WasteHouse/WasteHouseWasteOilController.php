<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WasteHouse\CreateWasteHouseOilWasteRequest;
use App\Http\Requests\WasteHouse\UpdateWasteHouseOilWasteRequest;
use App\Http\Resources\WasteHouse\WasteOilCollection;
use App\Http\Resources\WasteHouse\WasteOilResource;
use App\Services\Params\GeneralFilterParams;
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

    public function index(Request $request)
    {
        $params = GeneralFilterParams::fromRequest($request);

        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->paginate($params);

        return $this->apiSuccess(new WasteOilCollection($wasteHouseWasteOil), 'success');
    }

    public function show($id)
    {
        $wasteHouseWasteOil = $this->wasteHouseWasteOilService->findWasteHouseWasteOil($id);

        return $this->apiSuccess(new WasteOilResource($wasteHouseWasteOil), 'success');
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
