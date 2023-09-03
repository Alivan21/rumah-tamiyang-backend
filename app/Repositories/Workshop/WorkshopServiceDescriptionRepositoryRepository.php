<?php

namespace App\Repositories\Workshop;

use App\Models\WorkshopServiceDescription;
use Illuminate\Database\Eloquent\Builder;
use App\Contract\Workshop\IWorkshopServiceDescriptionRepository;

class WorkshopServiceDescriptionRepositoryRepository implements IWorkshopServiceDescriptionRepository
{
    private Builder $query;

    public function __construct(WorkshopServiceDescription $model)
    {
        $this->query = $model->newQuery();
    }
    public function create(array $data)
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
