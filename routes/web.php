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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


$router->group(['prefix' => 'brands', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'BrandController@index');
    $router->get('/view/{id}', 'BrandController@view');
    $router->get('/create', 'BrandController@create');
    $router->get('/update/{id}', 'BrandController@update');
    $router->post('/store/{id?}', 'BrandController@store');    
    $router->get('/delete/{brand}', 'BrandController@delete');
    $router->get('/trash', 'BrandController@trash');
    $router->get('/trash/restore/{id}', 'BrandController@restore');
});

$router->group(['prefix' => 'vehicletypes', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'VehicleTypeController@index');
    $router->get('/view/{id}', 'VehicleTypeController@view');
    $router->get('/create', 'VehicleTypeController@create');
    $router->get('/update/{id}', 'VehicleTypeController@update');
    $router->post('/store/{id?}', 'VehicleTypeController@store');    
    $router->get('/delete/{vehicletype}', 'VehicleTypeController@delete');
    $router->get('/trash', 'VehicleTypeController@trash');
    $router->get('/trash/restore/{id}', 'VehicleTypeController@restore');
});

$router->group(['prefix' => 'vehicles', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'VehicleController@index');
    $router->get('/view/{id}', 'VehicleController@view');
    $router->get('/create', 'VehicleController@create');
    $router->get('/update/{id}', 'VehicleController@update');
    $router->post('/store/{id?}', 'VehicleController@store');    
    $router->get('/delete/{vehicle}', 'VehicleController@delete');
    $router->get('/trash', 'VehicleController@trash');
    $router->get('/trash/restore/{id}', 'VehicleController@restore');
});

$router->group(['prefix' => 'profile', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'UserController@profile');
    $router->post('/update', 'UserController@update_my_profile');
    $router->post('/change_password', 'UserController@update_my_password');
});

$router->group(['prefix' => 'drivers', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'DriverController@index');
    $router->get('/view/{id}', 'DriverController@view');
    $router->get('/create', 'DriverController@create');
    $router->get('/update/{id}', 'DriverController@update');
    $router->post('/store/{id?}', 'DriverController@store');    
    $router->get('/delete/{driver}', 'DriverController@delete');
    $router->get('/trash', 'DriverController@trash');
    $router->get('/trash/restore/{id}', 'DriverController@restore');
});

$router->group(['prefix' => 'masterpoints', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'MasterPointController@index');
    $router->get('/view/{id}', 'MasterPointController@view');
    $router->get('/create', 'MasterPointController@create');
    $router->get('/update/{id}', 'MasterPointController@update');
    $router->post('/store/{id?}', 'MasterPointController@store');    
    $router->get('/delete/{masterPoint}', 'MasterPointController@delete');
    $router->get('/trash', 'MasterPointController@trash');
    $router->get('/trash/restore/{id}', 'MasterPointController@restore');
});

$router->group(['prefix' => 'routes', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'RouteController@index');
    $router->get('/view/{id}', 'RouteController@view');
    $router->get('/create', 'RouteController@create');
    $router->get('/update/{id}', 'RouteController@update');
    $router->post('/store/{id?}', 'RouteController@store');    
    $router->get('/delete/{route}', 'RouteController@delete');
    $router->get('/trash', 'RouteController@trash');
    $router->get('/trash/restore/{id}', 'RouteController@restore');
});

$router->group(['prefix' => 'transits', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'TransitController@index');
    $router->get('/view/{id}', 'TransitController@view');
    $router->get('/create', 'TransitController@create');    
    $router->post('/store/{id?}', 'TransitController@store');
});

$router->group(['prefix' => 'providers', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'ProviderController@index');
    $router->get('/view/{id}', 'ProviderController@view');
    $router->get('/create', 'ProviderController@create');
    $router->get('/update/{id}', 'ProviderController@update');
    $router->post('/store/{id?}', 'ProviderController@store');    
    $router->get('/delete/{provider}', 'ProviderController@delete');
    $router->get('/trash', 'ProviderController@trash');
    $router->get('/trash/restore/{id}', 'ProviderController@restore');
});

$router->group(['prefix' => 'tires', 'middleware' => 'auth'], function () use ($router){
    $router->get('/', 'TireController@index');
    $router->get('/view/{id}', 'TireController@view');
    $router->get('/create', 'TireController@create');
    $router->get('/update/{id}', 'TireController@update');
    $router->post('/store/{id?}', 'TireController@store');    
    $router->get('/delete/{tire}', 'TireController@delete');
    $router->get('/link/{id}', 'TireController@link_vehicle');
    $router->get('/unlink/{id}', 'TireController@unlink_vehicle');
    $router->post('/update_link/{id}', 'TireController@update_link');    
});