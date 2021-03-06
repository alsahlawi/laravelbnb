<?php

use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookableAvailabilityController;

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

// Route::get('bookables',function(Request $request){
//     return Bookable::all();
// });

// Route::get('bookables/{id}',function(Request $request,$id){
//     return Bookable::findorfail($id);
// });

// Route::resource('bookables', BookableController::class);
Route::apiResource('bookables', BookableController::class);

Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class)->name('bookable.availability.show');
