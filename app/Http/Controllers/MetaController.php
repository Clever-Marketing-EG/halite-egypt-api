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
    * @return \Illuminate\Http\JsonResponse
    */

    public function index() {
        $meta = trans( 'meta' );
        $arr = [];
        foreach ( $meta as $metum ) {

            if ( !array_key_exists( $metum['page'], $arr ) ) {
                $arr[$metum['page']] = [];
            }
            array_push( $arr[$metum['page']], $metum );
        }

        return $this->jsonResponse( $arr );

    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function fullIndex(): JsonResponse {
        $meta = Meta::all();
        return $this->jsonResponse( $meta );

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Meta  $meta
    * @return \Illuminate\Http\JsonResponse
    */

    public function show( Meta $metum ): jsonResponse {
        return $this->jsonResponse( $metum );

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Meta  $meta
    * @return \Illuminate\Http\JsonResponse
    */

    public function update( Request $request, Meta $metum ) {
        $validated = Meta::validate( $request );
        $metum->update( $validated );
        return $this->jsonResponse( $metum );

    }

}
