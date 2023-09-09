<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WasteHouse\CreateWasteHouseIncomeRequest;
use App\Http\Requests\WasteHouse\UpdateWasteHouseIncomeRequest;
use App\Services\WasteHouse\WasteHouseIncomeService;
use Illuminate\Http\Request;

class WasteHouseIncomeController extends Controller
{
    use apiResponse;

    private WasteHouseIncomeService $wasteHouseIncomeService;

    public function __construct(WasteHouseIncomeService $wasteHouseIncomeService)
    {
        $this->wasteHouseIncomeService = $wasteHouseIncomeService;
    }

    public function store(CreateWasteHouseIncomeRequest $request)
    {
        $wasteHouseIncome = $this->wasteHouseIncomeService->createWasteHouseIncome($request->validated());

        return $this->apiSuccess($wasteHouseIncome, 'success');
    }

    public function update(UpdateWasteHouseIncomeRequest $request, $id)
    {
        $wasteHouseIncome = $this->wasteHouseIncomeService->updateWasteHouseIncome($request->validated(), $id);

        return $this->apiSuccess($wasteHouseIncome, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseIncomeService->deleteWasteHouseIncome($id);

        return $this->apiSuccess(null, 'success');
    }
}
