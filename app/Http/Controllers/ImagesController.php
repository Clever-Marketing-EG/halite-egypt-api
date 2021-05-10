<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImagesController extends Controller {

    /**
    * Upload an Image
    *
    * @param Request $request
    * @return JsonResponse
    */

    public function store( Request $request ): JsonResponse {
        $request->validate( [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ] );

        $path = $request->file( 'image' )->store( 'images', 'public' );

        return response()->json( [
            'success' => true,
            'image_url' => asset( 'storage/' . $path )
        ] );
    }
}
