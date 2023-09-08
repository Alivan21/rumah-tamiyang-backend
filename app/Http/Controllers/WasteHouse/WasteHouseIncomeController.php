<?php

namespace App\Http\Controllers\WasteHouse;

use App\Commons\Traits\apiResponse;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $wasteHouseIncome = $this->wasteHouseIncomeService->createWasteHouseIncome($request->all());

        return $this->apiSuccess($wasteHouseIncome, 'success');
    }

    public function update(Request $request, $id)
    {
        $wasteHouseIncome = $this->wasteHouseIncomeService->updateWasteHouseIncome($request->all(), $id);

        return $this->apiSuccess($wasteHouseIncome, 'success');
    }

    public function destroy($id)
    {
        $this->wasteHouseIncomeService->deleteWasteHouseIncome($id);

        return $this->apiSuccess(null, 'success');
    }
}
