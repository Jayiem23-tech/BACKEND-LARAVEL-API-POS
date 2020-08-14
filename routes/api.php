<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// CATEGORY -----
Route::group(['prefix'=>'category'],function(){
    Route::post('save','CategoryController@save');
    Route::get('show','CategoryController@show'); 
    Route::post('delete','CategoryController@delete');   
});

// PRODUCTS -----
Route::group(['prefix'=>'product'],function(){
    Route::post('save','ProductsController@save');
    Route::get('show','ProductsController@show'); 
    Route::post('delete','ProductsController@delete');  
});

// TRANSACTION -----
Route::group(['prefix'=>'transaction'],function(){
    Route::post('saveHeader','TransactionsController@saveHeader');
    Route::post('saveBody','TransactionsController@saveBody'); 
    Route::get('show','TransactionsController@show'); 
});

// COMPANY -----
Route::group(['prefix'=>'company'],function(){
    Route::post('save','CompanyController@save');
    Route::get('show','CompanyController@show'); 
});

// USERS -----
Route::group(['prefix'=>'user'],function(){
    Route::post('save','UsersController@save');
    Route::get('show','UsersController@show'); 
    Route::post('delete','UsersController@delete');  
});

// REPORTS -----
Route::group(['prefix'=>'reports'],function(){
    Route::get('sales','ReportsController@SalesReport');  
});

 