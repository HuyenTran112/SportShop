<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\sanpham;

class ProductController extends Controller
{
     //Go to list product page
    public function getList(){
        //$listItem = sanpham::select('*')->get();
		$listItem = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloaisp', '=', 'loaisanpham.maloaisp')->get();
        return view('admin.product.list',compact('listItem'));
    }
	

}
