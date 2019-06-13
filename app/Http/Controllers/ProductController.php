<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\sanpham;
use App\cthd;
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
	public function postEdit($masp, Request $req){
		if(($req->status)=="on")
			$trangthai=1;
		else
			$trangthai=0;
		if($req->file('fImages')==null)
		DB::table('sanpham')
            ->where('masp', $masp)
            ->update(['tensp'=>$req->txtName,
			'dongia'=>$req->txtPrice,
			'giakhuyenmai'=>$req->txtPromotion,
			'mieuta'=>$req->txtDescription,
			'trangthai'=>$trangthai,
			'maloaisp' => $req->txtCategory,
			'manhacungcap'=>$req->txtSupplier
			]);
		else
		{
			$file_name = $req->file('fImages')->getClientOriginalName();
			DB::table('sanpham')
            ->where('masp', $masp)
            ->update(['tensp'=>$req->txtName,
			'dongia'=>$req->txtPrice,
			'giakhuyenmai'=>$req->txtPromotion,
			'mieuta'=>$req->txtDescription,
			'trangthai'=>$trangthai,
			'maloaisp' => $req->txtCategory,
			'manhacungcap'=>$req->txtSupplier,
			'hinhanh'=>$file_name]);
		}
				
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật sản phẩm thành công']);
   
		 }
		 
	public function getDelete($masp)
	{
		$countitem=cthd::where('masp',$masp)->count();
		if($countitem==0)
		{
			$product=DB::table('sanpham')->where('masp',$masp)->get();
			DB::table('sanpham')->where('masp',$masp)->delete();
			return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công sản phẩm.']);
		}
		else
		{
			return redirect()->route('admin.product.list')->with(['flash_level'=>'warning','flash_message'=>'Bạn không thể xóa sản phẩm này']);

		}
	}
	

}
