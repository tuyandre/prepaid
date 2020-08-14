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
    Route::post('admin/AddRole/save', [
        'uses' => 'RoleController@storeRoles',
        'as' => 'Roles.store'
    ]);
    Route::get('admin/AllRole', [
        'uses' => 'RoleController@getRoles',
        'as' => 'Roles.allRoles'
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
    // Users Routes

    Route::get('admin/AllUser', [
        'uses' => 'UserController@getUsers',
        'as' => 'users.allUsers'
    ]);
    Route::post('admin/AddUser/save', [
        'uses' => 'UserController@storeUser',
        'as' => 'users.store'
    ]);
    Route::put('admin/users/delete', [
        'uses' => 'UserController@destroy',
        'as' => 'users.delete'
    ]);

    // clients routes

    Route::get('admin/AllClient', [
        'uses' => 'ClientController@getClients',
        'as' => 'clients.allUsers'
    ]);
    
    Route::post('admin/AddClient/save', [
        'uses' => 'ClientController@storeClient',
        'as' => 'clients.store'
    ]);
    Route::put('admin/clients/delete', [
        'uses' => 'ClientController@destroy',
        'as' => 'clients.delete'
    ]);
    Route::put('admin/clients/show', [
        'uses' => 'ClientController@show',
        'as' => 'clients.show'
    ]);
    Route::post('admin/clients/update', [
        'uses' => 'ClientController@update',
        'as' => 'clients.updated'
    ]);
    // water bills routes
    Route::get('admin/waterBills', [
        'uses' => 'BillsController@getBills',
        'as' => 'bills.getBills'
    ]);
    Route::post('admin/AddBills/save', [
        'uses' => 'BillsController@storeBills',
        'as' => 'bills.store'
    ]);
    Route::get('admin/waterUsage', [
        'uses' => 'BillsController@getUsage',
        'as' => 'bills.getUSAGE'
    ]);