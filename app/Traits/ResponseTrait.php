<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * Success response.
     *
     * @param array|object $data
     * @param string $message
     *
     * @return JsonResponse
     */

    public function responseSuccess($data, $message = "Successful"): JsonResponse
    {
        return response()->json([
            'status' => "Success",
            'message' => $message,
            'data' => $data,
            'errors' => null
        ], Response::HTTP_OK);
    }

     /**
     * Errors response.
     *
     * @param array|object $errors
     * @param string $message
     * @param int $responseCode
     *
     * @return JsonResponse
     */

    public function responseErrors(
        $errors,
        $message = "Something went wrong",
        int $responseCode = Response::HTTP_OK
    ): JsonResponse
    {
        return response()->json([
            'status' => "Errors",
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], $responseCode);
    }
}

