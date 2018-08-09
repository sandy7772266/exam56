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

// Route::get('/', function () {
//     $name = 'tad';
//     $say  = '嗨！';
//     return view('exam.index', compact('name', 'say'));

// });

Route::pattern('exam', '[0-9]+');
Route::pattern('topic', '[0-9]+');

Route::get('/', 'ExamController@index')->name('index');
Auth::routes();

Route::get('/home', 'ExamController@index')->name('home');

Route::get('/exam', 'ExamController@index')->name('exam.index');
Route::get('/exam/create', 'ExamController@create')->name('exam.create');
Route::post('/exam', 'ExamController@store')->name('exam.store');
Route::get('/exam/{exam}', 'ExamController@show')->name('exam.show');

Route::get('/exam/{exam}/edit', 'ExamController@edit')->name('exam.edit');

Route::patch('/exam/{exam}', 'ExamController@update')->name('exam.update');
Route::delete('/exam/{exam}', 'ExamController@destroy')->name('exam.destroy');

Route::patch('/topic/{topic}', 'TopicController@update')->name('topic.update');
Route::post('/topic', 'TopicController@store')->name('topic.store');
Route::get('/topic/edit/{topic}', 'TopicController@edit')->name('topic.edit');
Route::delete('/topic/{topic}', 'TopicController@destroy')->name('topic.destroy');
