<?php

namespace App\Services\Params\Project;

use App\Http\Requests\Project\CreateProjectRequest;

class CreateProjectParams
{
    public int $user_id;
    public string $project_name;
    public string $project_description;
    public string $project_status;
    public \DateTime $project_registration_date;

   public static function fromRequest(CreateProjectRequest $request) : self
   {
       $params = new self();
       $params->user_id = $request->user_id;
       $params->project_name = $request->project_name;
       $params->project_description = $request->project_description;
       $params->project_status = $request->project_status;
       $params->project_registration_date = $request->project_registration_date;

       return $params;
   }
}
