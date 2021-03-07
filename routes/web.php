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

//Route::resource('/post', 'App\Http\Controllers\PostController');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/', 'PostController@index')->name('post.home');
    Route::get('post', 'PostController@index')->name('post.index');
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::get('post/show/{id}', 'PostController@show')->name('post.show');
    Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');

    Route::patch('post/show/{id}', 'PostController@update')->name('post.update');
    Route::delete('post/{id}', 'PostController@destroy')->name('post.destroy');
    Route::post('post', 'PostController@store')->name('post.store');
});

//Body class
View::composer('*', function ($view) {
    $view_name = str_replace('.', '-', $view->getName());
    View::share('view_name', $view_name);
});

//Authorize
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
