<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return $this->jsonResponse($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = Category::validate($request);
        $category = Category::create($validated);
        return $this->jsonResponse($category->viewFull(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return $this->jsonResponse($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $validated = Category::validate($request);
        $category->update($validated);
        return $this->jsonResponse($category->viewFull());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return $this->jsonResponse($category->viewFull());
    }


    /**
     * Full index for the dashboard
     *
     * @return JsonResponse
     */
    public function indexFull(): JsonResponse
    {
        $categories = Category::allFull();
        return $this->jsonResponse($categories);
    }


    /**
     * View full info for the dashboard
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function showFull(Category $category): JsonResponse
    {
        return $this->jsonResponse($category->viewFull());
    }
}
