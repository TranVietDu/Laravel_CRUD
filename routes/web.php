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

// Auth
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'checkuser'], function () {
    Route::get('/login', 'AuthController@getLogin');
    Route::get('/register', 'AuthController@getRegister');
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
});
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
// 
Route::get('/', 'App\Http\Controllers\HomeController@index');


// Admin
// User
Route::group(['prefix' => '/admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'HomeAdminController@index')->name('admin');
    Route::get('/users', 'UserManageController@index')->name('users');
    Route::delete('/users/{id}', 'UserManageController@destroy')->name('users.destroy');
    Route::get('/users/create', 'UserManageController@create')->name('users.create');
    Route::post('/users/store', 'UserManageController@store')->name('users.store');
    Route::get('/users/{id}/edit', 'UserManageController@edit')->name('users.edit');
    Route::put('/users/{id}', 'UserManageController@update')->name('users.update');
    Route::get('/users/destroyall', 'UserManageController@destroyall')->name('users.destroyall');
    Route::get('/users/search', 'UserManageController@search')->name('users.search');
    Route::get('/users/recycle_bin', 'UserManageController@getRecyclebin')->name('users.recyclebin');
    Route::delete('/users/permanentlydelete/{id}', 'UserManageController@permanentlyDelete')->name('users.permanentlydelete');
    Route::get('/users/restore/{id}', 'UserManageController@restore')->name('users.restore');
});
// Category
Route::group(['prefix' => '/admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');
    Route::get('/categories/destroyall', 'CategoryController@destroyall')->name('categories.destroyall');
    Route::get('/categories/search', 'CategoryController@search')->name('categories.search');
    Route::get('/categories/{id}/view_product', 'CategoryController@viewProduct')->name('categories.view_product');
});

// Products
Route::group(['prefix' => '/admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/products', 'ProductController@index')->name('products');
    Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products/store', 'ProductController@store')->name('products.store');
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('/products/{id}', 'ProductController@update')->name('products.update');
    Route::get('/products/destroyall', 'ProductController@destroyall')->name('products.destroyall');
    Route::get('/products/search', 'ProductController@search')->name('products.search');
});
// PricingPlan
Route::group(['prefix' => '/admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/pricing_plans', 'PricingPlanController@index')->name('pricing_plans');
    Route::delete('/pricing_plans/{id}', 'PricingPlanController@destroy')->name('pricing_plans.destroy');
    Route::get('/pricing_plans/create', 'PricingPlanController@create')->name('pricing_plans.create');
    Route::post('/pricing_plans/store', 'PricingPlanController@store')->name('pricing_plans.store');
    Route::get('/pricing_plans/{id}/edit', 'PricingPlanController@edit')->name('pricing_plans.edit');
    Route::put('/pricing_plans/{id}', 'PricingPlanController@update')->name('pricing_plans.update');
    Route::get('/pricing_plans/destroyall', 'PricingPlanController@destroyall')->name('pricing_plans.destroyall');
    Route::get('/pricing_plans/search', 'PricingPlanController@search')->name('pricing_plans.search');
});
// ItWork
Route::group(['prefix' => '/admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/it_works', 'ItWorkController@index')->name('it_works');
    Route::delete('/it_works/{id}', 'ItWorkController@destroy')->name('it_works.destroy');
    Route::get('/it_works/create', 'ItWorkController@create')->name('it_works.create');
    Route::post('/it_works/store', 'ItWorkController@store')->name('it_works.store');
    Route::get('/it_works/{id}/edit', 'ItWorkController@edit')->name('it_works.edit');
    Route::put('/it_works/{id}', 'ItWorkController@update')->name('it_works.update');
    Route::get('/it_works/destroyall', 'ItWorkController@destroyall')->name('it_works.destroyall');
    Route::get('/it_works/search', 'ItWorkController@search')->name('it_works.search');
});
