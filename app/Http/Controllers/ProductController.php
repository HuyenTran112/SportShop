<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\sanpham;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
     //Go to list product page
    public function getList(){
        //$listItem = sanpham::select('*')->get();
		$listItem = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloaisp', '=', 'loaisanpham.maloaisp')->get();
        return view('admin.product.list',compact('listItem'));
    }
	public function getAdd(){
        return view('admin.product.add');
    }
	//Thêm sản phẩm
    public function postAdd(ProductRequest $request){
		$file_name = $request->file('fImages')->getClientOriginalName();
	//	dd($file_name);
		$request->file('fImages')->move('../public/image', $file_name);
     	DB::table('sanpham')->insert(
		['tensp' =>$request->txtName, 'dongia' =>$request->txtPrice, 'giakhuyenmai' =>$request->txtPromotion, 'manhacungcap' =>$request->txtSupplier,'mieuta' =>$request->txtDescription,'hinhanh' =>$file_name,'trangthai'=>'1','maloaisp'=>$request->txtCategory ]
	);
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>"Thêm sản phẩm thành công"]);
	
	}
	//Cập nhật sản phẩm
	public function getEdit($masp)
	{
		$item=DB::table('sanpham')->join('loaisanpham','sanpham.maloaisp','=','loaisanpham.maloaisp')->where('masp','=',$masp)->first();
		return view('admin.product.edit',compact('item'));
	}
	public function postEdit($masp, Request $req,ProductRequest $request){
		$file_name = $request->file('fImages')->getClientOriginalName();
		dd ($file_name);
		
		 }
		 
	
	

}
