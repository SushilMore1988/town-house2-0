<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    
    Route::get('/select-type', 'ListCoLiveSpaceController@selectType')->name('select-type');

    Route::get('/create','CoLiveSpaceController@create')->name('create');

    Route::get('/edit/{slug}','CoLiveSpaceController@edit')->name('edit');

    Route::post('/store','CoLiveSpaceController@store')->name('store');

    /**
     * Keep this route at the bottom 
     */
    Route::get('/{viewType}', 'Browsing\BrowseCoLiveSpaceController@index')->name('list');

});



//puja routes//
// Route::get('/co-live-space/create', function () {
//     return view('front.colive.create-listing.add-co-live-space-details');
// })->name('colive-create');

// Route::get('/co-live-space/list', function () {
//     return view('front.colive.browse.list-view');
// })->name('colive-list');

// Route::get('/co-live-space/map', function () {
//     return view('front.colive.browse.map-view');
// })->name('colive-map');

// Route::get('/co-live-space/list-your-space-type', function () {
//     return view('front.colive.create-listing.list-your-space-type');
// })->name('colive-list-your-space-type');

// Route::get('/co-live-space/list-your-space', function () {
//     return view('front.colive.create-listing.list-your-space');
// })->name('colive-list-your-space');

// Route::get('/co-live-space/explore', function () {
// 	return view('front.colive.explore.index');
// })->name('colive-explore');

// Route::get('/co-live-space/dashboard', function () {
//     return view('front.colive.dashboard.dashboard');
// })->name('colive-dashboard');