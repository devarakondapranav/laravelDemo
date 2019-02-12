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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/testing', function () {
    return view('check');
});




Route::get('/check', function(){
	return "hello";
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', [
        'uses' => 'HomeController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::post('admin/assign-roles', [
        'uses' => 'BatchController@postAdminAssignRoles',
        'as' => 'admin/assign-roles',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::resource("/batches", 'BatchController' );
