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
	//Thêm sản phẩm
    public function postAdd(ProductRequest $req){
        $file_name = $req->file('fImages')->getClientOriginalName();
        $item = new Products;
        $item->name = $req->txtName;
        $item->id_type = $req->txtCategory;
        $item->description = $req->txtDescription;
        $item->price = $req->txtPrice;
        $item->promotion = $req->txtPromotion;
        $item->image = $file_name;
    	$req->file('fImages')->move('../resources/images', $file_name);
        $item->save();
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success', 'flash_message'=>'Successfully added product']);
    }
	
	

}
