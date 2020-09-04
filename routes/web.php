<?php
use App\Models\Store;
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
Route::get('/application', 'ApplicationController@index');
Route::post('/application/submit', 'ApplicationController@store');
Route::get('/', function () {
    return view('front.index')->with('store', Store::inRandomOrder()->get());
});

Auth::routes();

Route::get('/test', 'TestController@send');

Route::get('/admin', 'BackendController@index');
Route::get('/admin/list', 'BackendController@list');
Route::get('/admin/list-all', 'BackendController@list_all');

Route::get('/admin/ur/info', 'InfoController@index');
Route::post('/admin/ur/info/change', 'InfoController@update');

Route::get('/admin/user/list', 'UserController@index');
Route::get('/admin/user/list-all', 'UserController@list_all');
Route::get('/admin/user/{id}/show', 'UserController@show');
Route::post('/admin/user/{id}/buyticket', 'TicketController@create');
Route::delete('/admin/user/{id}/delete', 'UserController@destroy');

Route::get('/admin/ticket/list', 'TicketController@index');
Route::get('/admin/ticket/list-all', 'TicketController@list_all');
Route::get('/admin/ticket/cart', 'TicketController@show');
Route::get('/admin/ticket/{id}/fivecode', 'TicketController@customerSetFiveCode');
Route::get('/admin/ticket/{id}/edit', 'TicketController@edit');
Route::post('/admin/ticket/{id}/update', 'TicketController@update');
Route::post('/admin/ticket/{id}/customer_update', 'TicketController@customer_update');
Route::delete('/admin/ticket/{id}/delete', 'TicketController@destroy');

Route::get('/store/{url}', 'StorePageController@show');
Route::get('/admin/ads', 'ADController@index');
Route::get('/admin/ads/create', 'ADController@create');
Route::get('/admin/ads/{id}/edit', 'ADController@edit');
Route::post('/admin/ads/create/submit', 'ADController@store');
Route::delete('/admin/ads/{id}/delete', 'ADController@destroy');
Route::put('/admin/ads/{id}/update', 'ADController@update');


Route::get('/admin/storepage', 'StorePageController@index');
Route::get('/admin/storepage/create', 'StorePageController@create');
Route::get('/admin/storepage/{id}/edit', 'StorePageController@edit');
Route::post('/admin/storepage/create/submit', 'StorePageController@store');
Route::put('/admin/storepage/{id}/update', 'StorePageController@update');
Route::delete('/admin/storepage/{id}/delete', 'StorePageController@destroy');

