<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopExpenseDescriptionRepository;
use App\Contract\Workshop\IWorkshopExpenseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * class WorkshopExpenseService
 * @package App\Services\Workshop
 * @property IWorkshopExpenseRepository $workshopExpenseRepository
 */
class WorkshopExpenseService
{
    private IWorkshopExpenseRepository $workshopExpenseRepository;
    private IWorkshopExpenseDescriptionRepository $workshopExpenseDescriptionRepository;

    public function __construct(
        IWorkshopExpenseRepository $workshopExpenseRepository,
        IWorkshopExpenseDescriptionRepository $workshopExpenseDescriptionRepository
    )
    {
        $this->workshopExpenseRepository = $workshopExpenseRepository;
        $this->workshopExpenseDescriptionRepository = $workshopExpenseDescriptionRepository;
    }

    public function getAllWorkshopExpense(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->workshopExpenseRepository->paginate($page, $perPage, $with);
    }

    public function getWorkshopExpenseById($workshopId, array $with = [])
    {
        return $this->workshopExpenseRepository->find($workshopId, $with);
    }

    public function createWorkshopExpense(array $data)
    {
        try {
            DB::beginTransaction();
            $data['user_id'] = auth()->user()->id;

             $dataExpense = $this->workshopExpenseRepository->create($data);

             $dataWorkshop = [];

             foreach ($data['data'] as $value) {
                 $dataWorkshop[] = [
                     'workshop_expense_lists_id' => $value['workshop_expense_lists_id'],
                     'workshop_expense_id' => $dataExpense->id,
                     'description' => $value['description'] ?? null,
                     'amount' => $value['amount'] ?? 0
                 ];
             }

            $this->workshopExpenseDescriptionRepository->create($dataWorkshop);

            DB::commit();

            return $dataExpense->fresh();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function updateWorkshopExpense(array $data, $id)
    {
        return $this->workshopExpenseRepository->update($data, $id);
    }

    public function deleteWorkshopExpense($id)
    {
        return $this->workshopExpenseRepository->delete($id);
    }
}
