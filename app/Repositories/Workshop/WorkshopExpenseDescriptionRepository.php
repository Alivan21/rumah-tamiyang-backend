<?php

namespace App\Repositories\Workshop;

use App\Contract\Workshop\IWorkshopDescriptionRepository;
use App\Contract\Workshop\IWorkshopExpenseDescriptionRepository;
use App\Models\Workshop\WorkshopExpenseDescription;
use Illuminate\Database\Eloquent\Builder;

class WorkshopExpenseDescriptionRepository implements IWorkshopExpenseDescriptionRepository
{
    private Builder $query;

    public function __construct(WorkshopExpenseDescription $model)
    {
        $this->query = $model->newQuery();
    }

    public function create(array $data): array
    {
        $createdRecords = [];

        foreach ($data as $recordData) {
            $createdRecord = $this->query->create($recordData);
            $createdRecords[] = $createdRecord;
        }

        return $createdRecords;
    }

    public function update(array $data, $id)
    {
        $this->query->where('id', $id)->update($data);

        return $this->query->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query->where('id', $id)->delete();

    }
}
