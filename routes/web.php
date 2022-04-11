<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QueryController;

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
Route::get('/','PageController@comingsoon');
Route::get('/main','PageController@index');
Route::get('/about-us','PageController@about')->name('aboutus');
Route::get('/contact-us','PageController@contact')->name('contactus');
Route::get('/find-your-parts','PageController@findparts')->name('findparts');
Route::post('/submitquery','QueryController@store')->name('querycreate');
Route::post('/user-register',[App\Http\Controllers\Auth\RegisterController::class, 'regitser'])->name('userregister');
Route::get('/register-user',[App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('newuser');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->group(function () {
Route::group(['middleware' => ['admin']], function () { 
    Route::post('add-category', 'CategoryController@store')->name('addcategory');
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/{slug}', 'CategoryController@show')->name('category.show');
    Route::PUT('/categories/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::DELETE('/categories/{id}', 'CategoryController@destroy')->name('category.delete');
    Route::get('/new-category', 'CategoryController@create')->name('category.create');

    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
    Route::PUT('/users/{id}', 'UsersController@update')->name('users.update');
});

});
