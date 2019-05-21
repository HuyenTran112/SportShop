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


Route::get('/setting',
    [
	'as'=>'setting',
	'uses'=>'ProductController@getList'
]);
    
	
Route::group(['prefix'=>'admin']/*,'middleware'=>'checkLoginAdmin']*/, function(){
    // Manage products
    Route::group(['prefix'=>'product'], function(){
        Route::get('list', ['as'=>'admin.product.list', 'uses'=>'ProductController@getList']);	
       // Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        //Route::post('add', ['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
        //Route::get('delete/{id}', ['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
        //Route::get('edit/{id}', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        //Route::post('edit/{id}', ['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
    });
});



