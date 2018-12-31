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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'backend', 'middleware'=>'admin'], function () {
    Route::group(['prefix'=>'cate'], function () {
        Route::get('list', ['as'=>'admin.cate.getList', 'uses'=>'CateController@getList']);
        Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
        Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
        Route::get('delete/{id}/{alias}', ['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
        Route::get('edit/{id}/{alias}', ['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
        Route::post('edit/{id}/{alias}', ['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
    });

    Route::group(['prefix'=>'product'], function () {
        Route::get('list', ['as'=>'admin.product.getList', 'uses'=>'ProductController@getList']);
        Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        Route::post('add', ['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
        Route::get('delete/{id}/{alias}', ['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
        Route::get('edit/{id}/{alias}', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}/{alias}', ['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
        Route::get('delImg/{id}', ['as'=>'admin.product.getDelImg', 'uses'=>'ProductController@getDelImg']);
    });

    Route::group(['prefix'=>'user'], function () {
        Route::get('list', ['as'=>'admin.user.getList', 'uses'=>'UserController@getList']);
        Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
        Route::post('add', ['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
    });

    Route::group(['prefix'=>'slide'], function () {
        Route::get('list', ['as'=>'admin.slide.getList', 'uses'=>'SlideController@getList']);
        Route::get('add', ['as'=>'admin.slide.getAdd', 'uses'=>'SlideController@getAdd']);
        Route::post('add', ['as'=>'admin.slide.postAdd', 'uses'=>'SlideController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.slide.getDelete', 'uses'=>'SlideController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.slide.getEdit', 'uses'=>'SlideController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.slide.postEdit', 'uses'=>'SlideController@postEdit']);
    });
});
Route::get('login', ['as'=>'admin.user.getLogin', 'uses'=>'backend\LoginController@getLogin']);
Route::post('login', ['as'=>'admin.user.postLogin', 'uses'=>'backend\LoginController@postLogin']);
Route::get('logout', ['as'=>'admin.user.getLogout', 'uses'=>'backend\LoginController@getLogout']);

Route::group(['prefix'=>'frontend', 'namespace'=>'frontend'], function (){
    Route::get('trang-chu', ['as'=>'front.index', 'uses'=>'FrontController@getIndex']);
    Route::get('loai-san-pham/{id}/{alias}', ['as'=>'front.productType', 'uses'=>'FrontController@getProductType']);
    Route::get('about', ['as'=>'front.about', 'uses'=>'FrontController@getAbout']);
    Route::get('lien-he', ['as'=>'front.getContact', 'uses'=>'FrontController@getContact']);
    Route::post('lien-he', ['as'=>'front.postContact', 'uses'=>'FrontController@postContact']);
    Route::get('thanh-toan', ['as'=>'front.getCheckout', 'uses'=>'FrontController@getCheckout']);
    Route::post('thanh-toan', ['as'=>'front.postCheckout', 'uses'=>'FrontController@postCheckout']);
    Route::get('tim-kiem', ['as'=>'front.getSearch', 'uses'=>'FrontController@getSearch']);
    Route::get('san-pham/{id}/{alias}', ['as'=>'front.getProduct', 'uses'=>'FrontController@getProduct']);

    Route::get('dang-nhap', ['as'=>'front.getLogin', 'uses'=>'LoginController@getLogin']);
    Route::post('dang-nhap', ['as'=>'front.postLogin', 'uses'=>'LoginController@postLogin']);
    Route::get('dang-xuat', ['as'=>'front.getLogout', 'uses'=>'LoginController@getLogout']);
    Route::get('dang-ki', ['as'=>'front.getRegister', 'uses'=>'LoginController@getRegister']);
    Route::post('dang-ki', ['as'=>'front.postRegister', 'uses'=>'LoginController@postRegister']);

    Route::get('add-cart/{id}/{alias}', ['as'=>'front.addCart', 'uses'=>'CartController@addCart']);
    Route::get('show-cart', ['as'=>'front.showCart', 'uses'=>'CartController@showCart']);
    Route::get('delete-cart/{id}', ['as'=>'front.delCart', 'uses'=>'CartController@delCart']);
    Route::get('update-cart/{id}/{qty}', ['as'=>'front.updateCart', 'uses'=>'CartController@updateCart']);
});
