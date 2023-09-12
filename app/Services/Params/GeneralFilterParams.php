<?php

namespace App\Services\Params;

use Illuminate\Http\Request;

class GeneralFilterParams
{
    public int $page;
    public int $perPage;

    public static function fromRequest(Request $request): self
    {
        $params = new self();
        $params->page = $request->integer('page', 1);
        $params->perPage = $request->integer('perPage', 10);

        return $params;
    }
}
