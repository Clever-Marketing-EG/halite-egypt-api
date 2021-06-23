<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MetaController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $meta = Meta::all();
        return $this->jsonResponse($meta);
    }


    /**
     * Display the specified resource.
     *
     * @param Meta $metum
     * @return JsonResponse
     */
    public function show(Meta $metum): jsonResponse
    {
        return $this->jsonResponse($metum);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Meta $metum
     * @return JsonResponse
     */
    public function update(Request $request, Meta $metum): JsonResponse
    {
        $validated = Meta::validate($request);
        $metum->update($validated);
        return $this->jsonResponse($metum->viewFull());
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function fullIndex(): JsonResponse
    {
        $meta = Meta::allFull();
        return $this->jsonResponse($meta);
    }


    /**
     * Display the specified resource.
     *
     * @param Meta $metum
     * @return JsonResponse
     */
    public function showFull(Meta $metum): jsonResponse
    {
        return $this->jsonResponse($metum->viewFull());
    }
}
