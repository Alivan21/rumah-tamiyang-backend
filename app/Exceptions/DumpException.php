<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class DumpException extends Exception
{
    public function __construct(public mixed $data)
    {
    }

    #Post
    public function render(): JsonResponse
    {
        return response()->json([$this->data]);
    }
}
