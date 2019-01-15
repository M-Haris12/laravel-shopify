<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/','CustomController@CreateAsset')->middleware(['auth.shop'])->name('home');

Route::resource('shares', 'ShareController');
Route::post('/share/create','ShareController@createProduct');
Route::post('/share/delete','ShareController@deleteProduct');
Route::post('/share/update','ShareController@updateProduct');
Route::post('rendering',function(){
    Log::info('This is some useful information.');
    Log::debug('An informational message.');
    Log::emergency('The system is down!');
    return response('aaaaaa');
});
Route::get('/custom','CustomController@showProducts')->middleware(['auth.shop'])->name('showproducts');
Route::get('/addpage',function (){

    return view('addproduct');

})->name('addform');
Route::post('/addproduct','CustomController@addProducts')->middleware(['auth.shop'])->name('addproduct');

Route::get('/createhook','CustomController@CreateHook')->middleware(['cors'])->name('createhook');
// ->middleware(['auth.shop'])->name('createhook');
Route::get('/createasset','CustomController@CreateAsset');