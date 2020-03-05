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

use App\Http\Controllers\SiteController;

    Route::get('/', 'SiteController@home')->name('home');

    //Catalog/Shop

    Route::get('/shop', 'SiteController@shop')->name('Shop');

    //Catalog/Single

    Route::get('/single', 'SiteController@single')->name('Single Product');

    //Catalog/Checkout

    Route::get('/checkout', 'SiteController@checkout')->name('Checkout');

    // //News
    // Route::get('/news', function(){
    //     return "News";
    // })->name('news');

    // Route::get('/news/{date}/{slug}', function($date, $slug){
    //     echo $date;
    //     echo "<br>";
    //     echo $slug;
    // })->name('news');

    //About us

    Route::get('/about', 'SiteController@about')->name('About');

    //Blog

    Route::get('/blog', 'SiteController@blog')->name('Blog');

    //Blog-single

    Route::get('/blog/{id}', 'SiteController@blogs')->name('Blog-single');

    //Contact

    Route::get('/contact', 'SiteController@contact')->name('Contact');

    //Card

    Route::get('/card', 'SiteController@card')->name('Cart');

    //Admin routes

    Route::prefix('admin')->group(function()
    {
        Route::resource('posts', 'Admin\PostController');
    });


