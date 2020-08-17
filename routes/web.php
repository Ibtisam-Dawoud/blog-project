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
use Illuminate\Support\Facades\Auth;

Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/post/{id}', 'FrontEndController@show')->name('post');;
Route::get('/categoryposts/{id}', 'FrontEndController@categoryposts')->name('categoryposts');
Route::post('/', 'FrontEndController@send')->name('contact');


 Route::get('/Tagposts/{id}', 'FrontEndController@Tagposts')->name('Tagposts');
 Route::post('/comment/{id}', 'FrontEndController@store')->name('comment');


 Route::get('contact', function () {
    return view('contact');
});


Route::get('/admin/dashborad', function () {
    return view('admin.dashborad');
})->name('admin.dashborad');

Route::get('admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('admin.logout');

###############################################################################


###
Route::prefix('admin/categories')->middleware('auth')->name('admin.categories')->group(function () {
    
    Route::get('/', 'CategoryController@index')->name('');
    Route::get('/create', 'CategoryController@create')->name('.create');
    Route::post('/', 'CategoryController@store')->name('.store');;
    Route::get('/{id}', 'CategoryController@edit')->name('.edit');
    Route::put('/{id}', 'CategoryController@update')->name('.update');
    Route::delete('/{id}', 'CategoryController@destroy')->name('.delete');
});

#####
Route::prefix('admin/tags')->middleware('auth')->name('admin.tags')->group(function () {
    
    Route::get('/', 'TagController@index')->name('');
    Route::get('/create', 'TagController@create')->name('.create');
    Route::post('/', 'TagController@store')->name('.store');;
    Route::get('/{id}', 'TagController@edit')->name('.edit');
    Route::put('/{id}', 'TagController@update')->name('.update');
    Route::delete('/{id}', 'TagController@destroy')->name('.delete');
});

###
Route::prefix('admin/posts')->middleware('auth')->name('admin.posts')->group(function () {
    
    Route::get('/', 'PostController@index')->name('');
    Route::get('/create', 'PostController@create')->name('.create');
    Route::post('/', 'PostController@store')->name('.store');;
    Route::get('/{id}', 'PostController@edit')->name('.edit');
    Route::put('/{id}', 'PostController@update')->name('.update');
    Route::delete('/{id}', 'PostController@destroy')->name('.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
