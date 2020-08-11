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


Route::group(['prefix' => 'admin'], function () {
//    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
  //  Route::resource('tags', 'TagController');


  Route::get('/post/create',[
    'uses' => 'PostController@create',
    'as'=> 'post.create'
]);

Route::post('/post/store',[
    'uses' => 'PostController@store',
    'as'=> 'post.store'
]);

Route::get('/posts',[
    'uses' => 'PostController@index',
    'as'=> 'posts'
]);


Route::get('/post/edit/{id}',[
    'uses' => 'PostController@edit',
    'as'=> 'post.edit'
]);

Route::post('/post/update/{id}',[
    'uses' => 'PostController@update',
    'as'=> 'post.update'
]);

Route::get('/post/delete/{id}',[
    'uses' => 'PostController@destroy',
    'as'=> 'post.delete'
]);

###############################################################
  /*Route::get('/tags',[
    'uses' => 'TagController@index',
    'as'=> 'tags'
]);

Route::get('/tag/create',[
    'uses' => 'TagController@create',
    'as'=> 'tag.create'
]);

Route::post('/tag/store',[
    'uses' => 'TagController@store',
    'as'=> 'tag.store'
]);

Route::get('/tag/edit/{id}',[
    'uses' => 'TagController@edit',
    'as'=> 'tag.edit'
]);

Route::post('/tag/update/{id}',[
    'uses' => 'TagController@update',
    'as'=> 'tag.update'
]);

Route::get('/tag/delete/{id}',[
    'uses' => 'TagController@destroy',
    'as'=> 'tag.delete'
]);*/




###############################################################################

/*Route::get('/category/create',[
    'uses' => 'CategoryController@create',
    'as'=> 'category.create'
]);

Route::get('/categories',[
    'uses' => 'CategoryController@index',
    'as'=> 'categories'
]);

Route::post('/category/store',[
    'uses' => 'CategoryController@store',
    'as'=> 'category.store'
]);

Route::get('/category/edit/{id}',[
    'uses' => 'CategoryController@edit',
    'as'=> 'category.edit'
]);

Route::post('/category/update/{id}',[
    'uses' => 'CategoryController@update',
    'as'=> 'category.update'
]);

Route::get('/category/delete/{id}',[
    'uses' => 'CategoryController@destroy',
    'as'=> 'category.delete'
]);


*/

    
});



######################
/*Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
   // 'middleware' =>'auth',
], function() {

  

    Route::prefix('categories')->as('categories.')->group(function() {
        Route::get('/', 'CategoryController@index')->name('');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::get('/{id}', 'CategoryController@show')->name('show');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
        Route::put('/{id}', 'CategoryController@update')->name('update');
        Route::post('/', 'CategoryController@store')->name('store');
        Route::delete('/{id}/delete', 'CategoryController@delete')->name('delete');
    });

    

});
*/

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