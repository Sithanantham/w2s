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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'AdminController@dashboard')->name('users_list');
Route::get('/', 'AdminController@dashboard')->name('dashboard');

//User module
Route::get('/admin/users_list', 'AdminController@user')->name('users_list');
Route::get('/admin/add_user', 'AdminController@add_user')->name('add_user');
Route::post('/admin/save_user', 'AdminController@save_user')->name('save_user');
Route::get('/admin/{id}/edit_user', 'AdminController@edit_user')->name('edit_user');
Route::post('/admin/{id}/update_user', 'AdminController@update_user')->name('update_user');
Route::get('/admin/{id}/delete_user', 'AdminController@delete_user')->name('delete_user');
Route::get('/admin/{id}/status_user', 'AdminController@status_user')->name('status_user');


//Role module
Route::get('/admin/role_list', 'AdminController@role')->name('role_list');
Route::get('/admin/add_role', 'AdminController@add_role')->name('add_role');
Route::post('/admin/save_role', 'AdminController@save_role')->name('save_role');
Route::get('/admin/{id}/edit_role', 'AdminController@edit_role')->name('edit_role');
Route::post('/admin/{id}/update_role', 'AdminController@update_role')->name('update_role');
Route::get('/admin/{id}/delete_role', 'AdminController@delete_role')->name('delete_role');
Route::get('/admin/{id}/status_role', 'AdminController@status_role')->name('status_role');


//Role module
Route::get('/admin/menu_list', 'AdminController@menu')->name('menu_list');
Route::get('/admin/add_menu', 'AdminController@add_menu')->name('add_menu');
Route::post('/admin/save_menu', 'AdminController@save_menu')->name('save_menu');
Route::get('/admin/{id}/edit_menu', 'AdminController@edit_menu')->name('edit_menu');
Route::post('/admin/{id}/update_menu', 'AdminController@update_menu')->name('update_menu');
Route::get('/admin/{id}/delete_menu', 'AdminController@delete_menu')->name('delete_menu');
Route::get('/admin/{id}/status_menu', 'AdminController@status_menu')->name('status_menu');
