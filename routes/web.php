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
Route::get('trangchu', function () {
    return view('page.trangchu');
});
Route::get('sanpham', function () {
    return view('page.sanpham');
});
Route::get('blog', function () {
    return view('page.blog');
});
Route::get('gioithieu', function () {
    return view('page.gioithieu');
});
Route::get('lienhe', function () {
    return view('page.lienhe');
});