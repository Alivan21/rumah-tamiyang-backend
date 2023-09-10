<?php
    namespace App\Commons\Traits;

    use Illuminate\Contracts\Pagination\LengthAwarePaginator;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Resources\Json\ResourceCollection;
    use Illuminate\Support\Arr;

    trait apiResponse
        {
            public function apiResponse($message, $data = null, $statusCode = null): JsonResponse
            {
                return response()->json([
                    'code' => $statusCode,
                    'message' => $message,
                    'data' => $data,
                ], $statusCode);
            }

            public function apiSuccess($data = null, $message = null, $statusCode = 200): JsonResponse
            {
                $items = [
                    'message' => $message,
                    'data' => $data,
                ];

                if ($data instanceof ResourceCollection && $data->resource instanceof LengthAwarePaginator) {
                    $items = Arr::collapse([
                        $items,
                        json_decode($data->toResponse(request())->content(), true),
                    ]);
                }

                return response()->json($items, $statusCode);
            }

            public function apiError($errors, $message = null, $statusCode = null): JsonResponse
            {
                return response()->json([
                    'code' => $statusCode,
                    'data' => $errors,
                    'message' => $message,
                ], $statusCode);
            }
    }
