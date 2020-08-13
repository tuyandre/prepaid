<?php

use Illuminate\Support\Facades\Route;

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
Route::get('user/login', [
    'uses' => 'CustomerController@login',
    'as' => 'customer.login'
]);

Route::get('prepaid/admin/register', [
    'uses' => 'AdminController@register',
    'as' => 'admin.register'
]);
Route::post('prepaid/admin/register/store', [
    'uses' => 'AdminController@store',
    'as' => 'admin.store'
]);
Route::post('prepaid/login', [
    'uses' => 'Auth\LoginController@Login',
    'as' => 'prepaid.login'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/user/data', function () {
    return Auth::user();
  });
    // update profile
    Route::post('/update/password', [
        'uses' => 'AdminController@updatePassword',
        'as' => 'admin.updatePassword'
      ]);
     // update profile
     Route::post('/update/Profile', [
        'uses' => 'AdminController@updateProfile',
        'as' => 'admins.updateProfile'
    ]);

    Route::post('/update/photo', [
      'uses' => 'AdminController@updatePhoto',
      'as' => 'admins.updatePhoto'
    ]);


     // Routes of Roles

     Route::get('AddRole', [
        'uses' => 'RoleController@addRoles',
        'as' => 'Roles.addRole'
    ]);
    Route::post('admin/AddRole/save', [
        'uses' => 'RoleController@storeRoles',
        'as' => 'Roles.store'
    ]);
    Route::get('AllRoles', [
        'uses' => 'RoleController@getAllRoles',
        'as' => 'Roles.alls'
    ]);

    Route::get('admin/AllRole', [
        'uses' => 'RoleController@getRoles',
        'as' => 'Roles.allRoles'
    ]);
    Route::get('AddRole', [
        'uses' => 'RoleController@addRoles',
        'as' => 'Roles.addRole'
    ]);
    Route::put('admin/roles/delete', [
        'uses' => 'RoleController@destroy',
        'as' => 'roles.delete'
    ]);
    Route::put('admin/roles/show', [
        'uses' => 'RoleController@show',
        'as' => 'roles.show'
    ]);
    Route::post('admin/Roles/update', [
        'uses' => 'RoleController@update',
        'as' => 'roles.updated'
    ]);
