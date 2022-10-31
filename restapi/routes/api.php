<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => UserController::class,
    'products' => ProductController::class,
    'categories' => CategoryController::class,
]);

Route::get('/product/custom1',[ProductController::class,'custom1']);
Route::get('/product/custom2',[ProductController::class,'custom2']);
Route::get('/product/custom3',[ProductController::class,'custom3']);
Route::get('/product/list',[ProductController::class,'listWithCategories']);
Route::get('/categories/custom3',[CategoryController::class,'custom3']);
Route::get('/users/custom1',[UserController::class,'custom1']);

Route::post('/form/upload',[CategoryController::class,'upload']);
Route::post('/form/store',[CategoryController::class,'store']);



Route::post('/form/store',[ApplyController::class,'store']);
Route::post('/form/upload',[ApplyController::class,'uploadFile']);

Route::post('/form/delete',[ApplyController::class,'deleteFile']);


//Route::apiResource('/users',UserController::class);
//Route::apiResource('/products',ProductController::class);
//Route::apiResource('/categories',CategoryController::class);



//Route::apiResource([
//    'products'=>'App\Http\Controllers\Api\ProductController::class',
//    'users'=>'App\Http\Controllers\Api\UserController::class',
//    'categories'=>'App\Http\Controllers\Api\CategoryController::class'
//]);
