<?php
Route::get('/', function () {
    return redirect('/places');
});

Route::get('/photos/add', 'PlacesController@getAbstactPhotoForm')->middleware('place.checker')->name('places.add-photo');
Route::get('/place/{id}', 'PlacesController@getPlace')->name('get-place');


Route::group([
    'prefix' => 'places',
], function () {
    Route::get('/', 'PlacesController@getPlaces')->name('all-places');
    Route::get('/create', 'PlacesController@getCreateForm')->name('create-place-form');
    Route::get('/{id}/photos/add', 'PlacesController@getPhotosEditForm')->name('add-photo-form');
    Route::get('/addEstimate/{type}/{target_id}/{action_type}', 'PlacesController@doEstimate')->name('add-estimation');

    Route::post('/addPhoto', 'PlacesController@addPhotoToPlace')->name('add-photo-request');
    Route::post('/add', 'PlacesController@createPlace')->name('add-place-request');
});