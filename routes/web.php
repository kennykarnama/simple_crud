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
//     return view('welcome');
// });


Route::get('/', ['uses' => 'Pages\HomeController@index'])->name('home');

Route::post('/create', ['uses' => 'Pages\HomeController@create'])->name('home.create');

Route::get('/detail/{fileName}', ['uses' => 'Pages\HomeController@retrieve'])->name('home.retrieve');

Route::get('/submission_result', ['uses' => 'Pages\HomeController@submission_resut'])->name('home.submission_result');
