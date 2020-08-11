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

//use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontEndController@index');
Route::get('/post/{id}', 'FrontEndController@show')->name('post');;
Route::get('/categoryposts/{id}', 'FrontEndController@categoryposts')->name('categoryposts');

 Route::get('/Tagposts/{id}', 'FrontEndController@Tagposts')->name('Tagposts');

Route::get('/admin/dashborad', function () {
    return view('admin.dashborad');
})->name('admin.dashborad');








###############################################################################




###
Route::prefix('admin/categories')->name('admin.categories')->group(function () {
    
    Route::get('/', 'CategoryController@index')->name('');
    Route::get('/create', 'CategoryController@create')->name('.create');
    Route::post('/', 'CategoryController@store')->name('.store');;
    Route::get('/{id}', 'CategoryController@edit')->name('.edit');
    Route::put('/{id}', 'CategoryController@update')->name('.update');
    Route::delete('/{id}', 'CategoryController@destroy')->name('.delete');
});

#####
Route::prefix('admin/tags')->name('admin.tags')->group(function () {
    
    Route::get('/', 'TagController@index')->name('');
    Route::get('/create', 'TagController@create')->name('.create');
    Route::post('/', 'TagController@store')->name('.store');;
    Route::get('/{id}', 'TagController@edit')->name('.edit');
    Route::put('/{id}', 'TagController@update')->name('.update');
    Route::delete('/{id}', 'TagController@destroy')->name('.delete');
});

###
Route::prefix('admin/posts')->name('admin.posts')->group(function () {
    
    Route::get('/', 'PostController@index')->name('');
    Route::get('/create', 'PostController@create')->name('.create');
    Route::post('/', 'PostController@store')->name('.store');;
    Route::get('/{id}', 'PostController@edit')->name('.edit');
    Route::put('/{id}', 'PostController@update')->name('.update');
    Route::delete('/{id}', 'PostController@destroy')->name('.delete');
});
