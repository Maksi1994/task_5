<?php

use Illuminate\Http\Request;

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

Route::get('/get-all-places', 'PlacesController@getPlacesByRating')->name('api.places.all');
Route::get('/images/get-place-images/{id}', 'PlacesController@getPlaceImages')->name('api.images.images-by-place');