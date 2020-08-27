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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/test', 'TestController@index')->name('test');

//Route::get('/testapi', 'TestApis@test');
//Route::get('/','LoginController');

//Auth::routes();
//Route for book
//Route::middleware(['auth'])->prefix('book')->name('book.')->group(function (){
//    Route::get('index','BookController@index')->name('index');
//    Route::get('create', 'BookController@create')->name('create');
//    Route::post('uploadImage/{id}','BookController@uploadImage')->name('uploadImage');
//    Route::delete('deleteImage/{id}','BookController@deleteImage')->name('deleteImage');
//    Route::post('store', 'BookController@store')->name('store');
//    Route::get('show/{id}', 'BookController@show')->name('show');
//    Route::get('edit/{id}', 'BookController@edit')->name('edit');
//    Route::post('update/{id}', 'BookController@update')->name('update');
//    Route::delete('destroy/{id}', 'BookController@destroy')->name('destroy');
//    Route::get('typeBook/{id}', 'BookController@typeBook')->name('typeBook');
//    Route::post('temp', 'BookController@temp');
//});
//
//});
//Route for normal user
Route::group(['middleware' => ['auth']], function () {
//    Route::get('/', 'PagesController@index');
//    Route::get('/', 'PagesController@login');
    Route::get('/home', 'HomeController@index');
    Route::get('lang/{lang}',function($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    });
    Route::get('/welcome/{id}', 'UsersController@index');
    Route::get('/detailbook/{id}', 'UsersController@detailbook');

    Route::get('/welcome/{iduser}/typeBook/{typeid}', 'UsersController@typeBook');

    Route::get('/editprofile/{id}', 'UsersController@editprofile');
    Route::post('/updateProfileUser','UsersController@updateProfileUser');
    Route::post('/uploadImageProfile/{id}','UsersController@uploadImageProfile');
    //cart
    Route::get('/cartbook/{iduser}','CartController@inCart');
//    Route::get('/cartbook/{idbook}/{iduser}','CartController@addcart');
    Route::get('/addCart/{idbook}/{day}','CartController@addcart');
    Route::get('/acceptBuy','CartController@acceptBuy');
    Route::get('/bill','CartController@bill');
    Route::get('/myHistory/{iduser}','CartController@history');
    Route::delete('destroyBookInCart/{id}', 'CartController@destroyBookInCart');
//    Route::delete('destroyBookInCart/{id}', 'CartController@destroyBookInCart');
});

//Route::group(['prefix' => 'user'], function(){
//    Route::group(['middleware' => ['user']], function(){
//        Route::get('/welcome', 'UsersController@index')->name('welcome');
//
//    });
//});
//Route for admin
Route::group(['middleware' => ['admin']], function(){
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/dashboard', 'PagesController@index');
        Route::get('/createuser', 'PagesController@createuser');
        Route::get('/edituser/{id}', 'PagesController@edituser');
        Route::get('/showuser/{id}', 'PagesController@showuser');
        Route::get('/{id}', 'PagesController@index');
        Route::get('/deleteUser/{id}', 'PagesController@deleteUser');
        Route::post('/save', 'PagesController@save');
        Route::post('/uploadImageProfile/{id}','PagesController@uploadImageProfile');
        //Route for admin/book


    });
    //Route for book status = admin !!
    Route::prefix('book')->name('book.')->group(function (){
        Route::get('index','BookController@index')->name('index');
        Route::get('create', 'BookController@create')->name('create');
        Route::post('uploadImage/{id}','BookController@uploadImage')->name('uploadImage');
        Route::delete('deleteImage/{id}','BookController@deleteImage')->name('deleteImage');
        Route::post('store', 'BookController@store')->name('store');
        Route::get('show/{id}', 'BookController@show')->name('show');
        Route::get('edit/{id}', 'BookController@edit')->name('edit');
        Route::post('update/{id}', 'BookController@update')->name('update');
        Route::delete('destroy/{id}', 'BookController@destroy')->name('destroy');
        Route::get('typeBook/{id}', 'BookController@typeBook')->name('typeBook');
        Route::post('temp', 'BookController@temp');
    });
});


//Route::get('/', function () {
//    return view('layouts/sidebar');
//});
