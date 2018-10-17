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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/practice', function () {
  return view('prac', ['name'=>'쿠러그']);
});

// 인증
// register, login, password/reset 등
Route::auth();

// 할 일 목록 보기
Route::get('/tasks', 'TaskController@index');

// 할 일 추가
Route::post('/add', 'TaskController@store');

// 할 일 삭제
Route::delete('/remove/{task}', 'TaskController@destroy');
