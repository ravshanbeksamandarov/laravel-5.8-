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

use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SiteController;
 use Illuminate\Support\Facades\Route;

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
    Route::get('/blog/{id}', 'SiteController@blogs')->name('Blog-single');

    //Contact

    Route::get('/contact', 'SiteController@contact')->name('contact');
    Route::post('/contact', 'SiteController@feedbackStore')->name('contact.store');

    //Search

    Route::get('/search', 'SiteController@search')->name('search');

    //Card

    Route::get('/card', 'SiteController@card')->name('Cart');

    //Admin routes

    Route::namespace('Admin')->middleware('auth')->name('admin.')->prefix('admin')->group(function(){
        Route::get('/', function(){
            return redirect()->route('admin.posts.index');
        })->name('dashboard');
        Route::resource('posts', 'PostController');
        Route::get('feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
        Route::get('feedbacks/{id}/show', 'FeedbacksController@show')->name('feedbacks.show');
        Route::delete('feedbacks/{id}/delete', 'FeedbacksController@delete')->name('feedbacks.delete');
    });

    // Route::get('file', 'FileController@index')->name('file.form');
    // Route::post('file', 'FileController@store')->name('file.store');

Auth::routes([
     'register' => true
]);

//Route::get('/home', 'HomeController@index')->name('home');
