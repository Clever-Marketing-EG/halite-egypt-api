<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Returns json response with given data
     *
     * @param $data
     * @param int $status
     * @return JsonResponse
     */
    public function jsonResponse($data, int $status = 200): JsonResponse
    {
        $data = is_array($data) ? $data : [ 'data' => $data ];
        return response()->json(array_merge(
            ['success' => true],
            $data
        ), $status);
    }
}
