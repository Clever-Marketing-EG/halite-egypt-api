<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
*/

Route::apiResource( 'categories', CategoryController::class );
Route::get('dashboard/categories/{category}',[CategoryController::class, 'showFull']);


/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/

Route::apiResource( 'products', ProductController::class );
Route::get('dashboard/products/{product}',[ProductController::class, 'showFull']);



/*
|--------------------------------------------------------------------------
| Mails Routes
|--------------------------------------------------------------------------
*/
Route::post('/mails/contact-us', [MailController::class, 'contactUs']);




/*
|--------------------------------------------------------------------------
| Images Routes
|--------------------------------------------------------------------------
*/
Route::post('/images', [ImagesController::class, 'store'])->name('images.store');


/*
|--------------------------------------------------------------------------
| Meta Routes
|--------------------------------------------------------------------------
*/
Route::apiResource( 'meta', MetaController::class )->except(['store', 'destroy']);
Route::get('dashboard/meta',[MetaController::class, 'fullIndex']);
Route::get('dashboard/meta/{metum}',[MetaController::class, 'showFull']);


Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

    Route::post('refresh', [AuthController::class, 'refresh'])
        ->name('auth.refresh');

    Route::post('me', [AuthController::class, 'me'])
        ->name('auth.name');

    // Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    //     ->name('password.email');
});
