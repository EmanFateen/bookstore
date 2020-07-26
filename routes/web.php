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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::redirect('/','bookstore/book');

Route::group(['prefix' => 'bookstore'], function() {


    Route::get('/book','BooksController@index')->name('book.index');

    Route::group(['middleware'=> ['auth:web']],function(){
        Route::resource('publisher','PublishersController');
        Route::resource('book','BooksController')->except(['index']);
        Route::resource('author','AuthorsController');

    });
});

