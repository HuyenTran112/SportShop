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
Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('loaisanpham/{maloaisp}',[
    'as'=>'loai-san-pham',
    'uses'=>'PageController@getLoaiSp'
]);



Route::get('chi-tiet-san-pham/{masp}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChiTiet'
]);

Route::get('gio-hang',[
    'as'=>'giohang',
    'uses'=>'PageController@getCheckout'
]);
Route::post('gio-hang',[
    'as'=>'giohang',
    'uses'=>'PageController@postCheckout'
]);

Route::get('san-pham',[
    'as'=>'sanpham',
    'uses'=>'PageController@getSanPham'
]);



Route::get('/login', function () {
    return view('admin.login');
});

// Route::get('register',[
//     'as'=>'register',
//     'uses'=>'PageController@getRegister'
// ]);

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

// Route::post('gio-hang',[
// 	'as'=>'giohang',
// 	'uses'=>'PageController@postCheckout'
// ]);


Route::get('/setting',
    [
	'as'=>'setting',
	'uses'=>'ProductController@getList'
]);
	
Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'], function(){
    // Manage products
    Route::group(['prefix'=>'product'], function(){
        Route::get('list', ['as'=>'admin.product.list', 'uses'=>'ProductController@getList']);	
        Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
       	Route::post('add', ['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
    });

// quản lý loại sản phẩm
 Route::group(['prefix'=>'cate'], function(){
        Route::get('list', ['as'=>'admin.cate.list', 'uses'=>'CateController@getList']);	
        Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
       	Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
		Route::get('show/{id}', ['as'=>'admin.cate.showProduct', 'uses'=>'CateController@getshowProduct']);
        
    });
//quản lý  user
Route::group(['prefix'=>'user'], function(){
        Route::get('list', ['as'=>'admin.user.list', 'uses'=>'UserController@getList']);	
        Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
       	Route::post('add', ['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
    });
	//quản lý  khách hàng
Route::group(['prefix'=>'customer'], function(){
        Route::get('list', ['as'=>'admin.customer.list', 'uses'=>'CustomerController@getList']);	
        Route::get('showBill/{id}', ['as'=>'admin.customer.showBill', 'uses'=>'CustomerController@showBill']);
  
    });
//quản lý nhà cung cấp
Route::group(['prefix'=>'supplier'], function(){
        Route::get('list', ['as'=>'admin.supplier.list', 'uses'=>'SupplierController@getList']);	
        Route::get('add', ['as'=>'admin.supplier.getAdd', 'uses'=>'SupplierController@getAdd']);
       	Route::post('add', ['as'=>'admin.supplier.postAdd', 'uses'=>'SupplierController@postAdd']);
        Route::get('delete/{id}', ['as'=>'admin.supplier.getDelete', 'uses'=>'SupplierController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.supplier.getEdit', 'uses'=>'SupplierController@getEdit']);
        Route::post('edit/{id}', ['as'=>'admin.supplier.postEdit', 'uses'=>'SupplierController@postEdit']);
		Route::get('showProduct/{id}', ['as'=>'admin.supplier.showProduct', 'uses'=>'SupplierController@showProduct']);
    });
//Báo cáo
Route::group(['prefix'=>'report'], function(){
        Route::get('bcdoanhthu', ['as'=>'admin.report.BaoCaoDoanhThu', 'uses'=>'ReportController@BaoCaoDoanhThu']);	
		Route::get('bcsanpham', ['as'=>'admin.report.BaoCaoSanPham', 'uses'=>'ReportController@BaoCaoSanPham']);	
		
  });
//quản lý hóa đơn
Route::group(['prefix'=>'bill'], function(){
        Route::get('list', ['as'=>'admin.bill.showBill', 'uses'=>'BillController@getList']);
		 Route::get('print/{id}', ['as'=>'admin.bill.printBill', 'uses'=>'BillController@printBill']);
		Route::get('update/{id}', ['as'=>'admin.bill.getUpdateBill', 'uses'=>'BillController@getUpdateBill']);
		Route::get('check/{id}', ['as'=>'admin.bill.getCheckBill', 'uses'=>'BillController@getCheckBill']);
		Route::get('delete/{id}', ['as'=>'admin.bill.getDeleteBill', 'uses'=>'BillController@getDeleteBill']);
		Route::get('showBillDetail/{id}', ['as'=>'admin.bill.showBillDetail', 'uses'=>'BillController@getBillDetail']);
    });
});
//Đăng nhập vào trang quản lý
Route::get('auth/login', ['as'=>'admin.login', 'uses'=>'LoginAdminController@getLogin']);
Route::post('auth/login', ['as'=>'admin.login', 'uses'=>'UserController@postLogin']);
Route::get('auth/logout', ['as'=>'admin.logout', 'uses'=>'LoginAdminController@getLogout']);
//Giỏ hàng
Route::group(['prefix'=>'cart'], function(){
    Route::get('delete/{masp}',['as'=>'xoagiohang', 'uses'=>'PageController@getDelItemCart']);
    Route::get('add/{masp}/{mamau}/{masize}/{soluong}',['as'=>'themgiohang', 'uses'=>'PageController@getAddtoCart']);
    Route::get('increase/{masp}/{mamau}/{masize}',['as'=>'tangiohang', 'uses'=>'PageController@getIncreaseItemCart']);
    Route::get('reduce/{masp}',['as'=>'giamgiohang', 'uses'=>'PageController@getReduceItemCart']);
});



// Route::get('cap-nhat/{masp}/{qty}',
// [
// 	'as'=>'capnhat',
// 	'uses'=>'PageController@capnhat'
// ]);

//đăng ký tài khoản
Route::get('dang-ky',['as'=>'signin', 'uses'=>'UserController@getSignin']);
Route::post('dang-ky',['as'=>'signin', 'uses'=>'UserController@postSignin']); 
//đăng nhập
Route::get('dang-nhap',['as'=>'login', 'uses'=>'UserController@getLogin']);
Route::post('dang-nhap',['as'=>'login', 'uses'=>'UserController@postLogin']); 
//đăng xuất
Route::get('dang-xuat',['as'=>'logout', 'uses'=>'UserController@getLogout']);

//Tìm kiếm
Route::get('search',['as'=>'search', 'uses'=>'PageController@getSearch']);


