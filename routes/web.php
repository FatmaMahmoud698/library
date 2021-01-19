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
/* Auth*/
//register
Route::get('/register','AuthController@register')->name('authRegister');
Route::post('/doRegister','AuthController@doRegister')->name('authDoRegister');
//login
Route::get('/login','AuthController@login')->name('authLogin');
Route::post('/doLogin','AuthController@doLogin')->name('authDoLogin');
Route::middleware('UserAuth')->group(function(){
	//create
	Route::get('/authors/create','AuthorController@create')->name('createAuthor');
	Route::post('/authors/store','AuthorController@store')->name('storeAuthor');

	//create
	Route::get('/books/create','BookController@create')->name('createBook');
	Route::post('/books/store','BookController@store')->name('storeBook');
	Route::get('/categories/create','CategoryController@create')->name('createCategory');
	Route::post('/categories/store','CategoryController@store')->name('storeCategory');


	//logout
	Route::get('/logout','AuthController@logout')->name('authLogout');

	Route::middleware('isAdmin')->group(function(){

        //update
        Route::get('/books/edit/{id}','BookController@edit')->name('editBook');
        Route::Post('/books/update/{id}','BookController@update')->name('updateBook');
        Route::get('/categories/edit/{id}','CategoryController@edit')->name('editCategory');
        Route::Post('/categories/update/{id}','CategoryController@update')->name('updateCategory');
        //update
        Route::get('/authors/edit/{id}','AuthorController@edit')->name('editAuthor');
        Route::Post('/authors/update/{id}','AuthorController@update')->name('updateAuthor');
		//delete
		Route::get('/books/delete/{id}','BookController@delete')->name('deleteBook');
		//delete
		Route::get('/authors/delete/{id}','AuthorController@delete')->name('deleteAuthor');
		//delete
		Route::get('/categories/delete/{id}','CategoryController@delete')->name('deleteCategory');
	});

});

Route::get('/', function () {
    return view('welcome');
});
Route::post('/message/send','MessageController@send')->name('messageSend');
/* Authors */
Route::get('/authors','AuthorController@index')->name('allAuthors');
Route::get('/authors/latest','AuthorController@latest')->name('latestAuthors');
Route::get('/authors/show/{id}','AuthorController@show')->name('showAuthor');
Route::get('/authors/search/{word}','AuthorController@search')->name('searchAuthor');


/*Books */
Route::get('/books','BookController@index')->name('allBooks');
Route::get('/books/latest','BookController@latest')->name('latestbooks');
Route::get('/books/show/{id}','BookController@show')->name('showBook');
Route::get('/books/search/{word}','BookController@search')->name('searchBook');

/*Categories */
Route::get('/categories','CategoryController@index')->name('allCategories');
Route::get('/categories/latest','CategoryController@latest')->name('latestCategories');
Route::get('/categories/show/{id}','CategoryController@show')->name('showCategory');
Route::get('/categories/search/{word}','CategoryController@search')->name('searchCategory');


