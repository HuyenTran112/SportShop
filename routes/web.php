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
Route::get('index',['as'=>'trang-chu',
'uses'=>'PageController@getIndex']);

Route::get('loaisanpham/{maloaisp}',['as'=>'loai-san-pham',
'uses'=>'PageController@getLoaiSp']);



Route::get('chi-tiet-san-pham/{masp}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChiTiet'
]);

Route::get('gio-hang',[
    'as'=>'giohang',
    'uses'=>'PageController@getCheckout'
]);

Route::get('san-pham',[
    'as'=>'sanpham',
    'uses'=>'PageController@getSanPham'
]);

Route::get('add-to-cart/{masp}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]
);

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('register',['as'=>'register',
'uses'=>'PageController@getRegister']);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'
]);
Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getGioithieu'
]);
Route::get('blog',[
    'as'=>'blog',
    'uses'=>'PageController@getBlog'
]);

Route::post('gio-hang',[
	'as'=>'giohang',
	'uses'=>'PageController@postCheckout'
]);

    



