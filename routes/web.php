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
// Contact route
Route::get('/', 'ContactsController@index')->name('guest.home');
Route::get('/contact/show', 'ContactsController@show')->name('contact.show');
Route::get('/contact/insert', 'ContactsController@add')->name('contact.add');
Route::post('/contact/save', 'ContactsController@save')->name('contact.save');
Route::get('/contact/edit/{id}', 'ContactsController@contactEdit')->name('contact.edit');
Route::post('/contact/update/{name}', 'ContactsController@ContactUpdate')->name('contact.update');
Route::delete('/contact/delete/{id}', 'ContactsController@ContactDelete')->name('contact.delete');

// Image Route
Route::get('/image', 'ImagesController@index')->name('image.index');
Route::post('/image', 'ImagesController@SaveImage')->name('image.save');
Route::get('/image/edit/{id}', 'ImagesController@EditImage')->name('image.edit');
Route::post('/image/update/{id}', 'ImagesController@UpdateImage')->name('image.update');
Route::delete('/image/delete/{id}', 'ImagesController@DeleteImage')->name('image.delete');
Route::get('/file', 'FileController@Index')->name('file.index');
Route::post('/file', 'FileController@Save')->name('file.save');
Route::get('/file/edit/{id}', 'FileController@Edit')->name('file.edit');
Route::post('/file/update/{id}', 'FileController@Update')->name('file.update');
Route::delete('/file/delete/{id}', 'FileController@Delete')->name('file.delete');