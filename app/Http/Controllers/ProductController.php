<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::all();
        return $this->jsonResponse($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = Product::validate($request);
        $product = Product::create($validated);
        return $this->jsonResponse($product->viewFull(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return $this->jsonResponse($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(Request $request, Product  $product): JsonResponse
    {
        $validated = Product::validate($request);
        $product->update($validated);
        return $this->jsonResponse($product->viewFull());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product  $product): JsonResponse
    {
        $product->delete();
        return $this->jsonResponse($product->viewFull());
    }


    /**
     * Full index for the dashboard
     *
     * @return JsonResponse
     */
    public function indexFull(): JsonResponse
    {
        $products = Product::allFull();
        return $this->jsonResponse($products);
    }


    /**
     * View full info for the dashboard
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function showFull(Product $product): JsonResponse
    {
        return $this->jsonResponse($product->viewFull());
    }
}
