<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items',[ItemsController::class, 'index']);
Route::prefix('/item')->group(function(){
	Route::post('/store', [ItemsController::class, 'store']);
	Route::put('/{id}', [ItemsController::class, 'update']);
	Route::delete('/{id}', [ItemsController::class, 'destroy']);

	// Route::post('/store', 'ItemsController@store');
});

Route::post('/create_token_spinnwin',[App\Http\Controllers\SpinAndWin::class, 'createTokenSpinnWin']);
Route::get('/get_site_records',[App\Http\Controllers\SpinAndWin::class, 'getSiteRecords']);
Route::post('/insert_items',[App\Http\Controllers\SpinAndWin::class, 'InsertItems']);
Route::get('/get_items',[App\Http\Controllers\SpinAndWin::class, 'getItems']);
Route::post('/spin_wheel',[App\Http\Controllers\SpinAndWin::class, 'spinWheel']);
Route::get('/get_prize',[App\Http\Controllers\SpinAndWin::class, 'getUserPrize']);
Route::post('/store_prize',[App\Http\Controllers\SpinAndWin::class, 'storePrize']);

