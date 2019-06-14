<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhacungcap;
use App\sanpham;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function getList(){
        $listItem = nhacungcap::select('*')->get();
        return view('admin.supplier.list',compact('listItem'));
    }
	//Thêm nhà cung cấp
	public function getAdd()
	{
		return view('admin.supplier.add');
	}
	public function postAdd(SupplierRequest $request)
	{
		$nhacc=new nhacungcap;
		DB::table('nhacungcap')->insert(
		['tennhacungcap' =>$request->txtName,'diachi'=> $request->txtAddress,'dienthoai'=>$request->txtPhone,'email'=>$request->txtEmail,'trangthai'=>'1']
	);
		return redirect()->route('admin.supplier.list')->with(['flash_level'=>'success','flash_message'=>"Thêm nhà cung cấp thành công"]);
	}
	//Cập nhật nhà cung cấp
	public function getEdit($manhacungcap)
	{
		$item=DB::table('nhacungcap')->where('manhacungcap',$manhacungcap)->first();
		//dd($manhacungcap);
		return view('admin.supplier.edit',compact('item'));
	}
	public function postEdit($manhacungcap, Request $req)
	{
		if(($req->status)=="on")
			$trangthai=1;
		else
			$trangthai=0;
		DB::table('nhacungcap')->where('manhacungcap',$manhacungcap)
		->update(['tennhacungcap'=>$req->txtName,'diachi'=>$req->txtAddress,'dienthoai'=>$req->txtPhone,'email'=>$req->txtEmail,'trangthai'=>$trangthai]);
		return redirect()->route('admin.supplier.list')->with(['flash_level'=>'success','flash_message'=>"Cập nhật nhà cung cấp thành công"]);
		}
		//Xóa nhà cung cấp
	public function getDelete($manhacungcap)
	{
		$itemcount=DB::table('sanpham')->where('manhacungcap',$manhacungcap)->count();
		if($itemcount==0)
		{
			DB::table('nhacungcap')->where('manhacungcap',$manhacungcap)->delete();
			return redirect()->route('admin.supplier.list')->with(['flash_level'=>'success','flash_message'=>"Xóa thành công nhà cung cấp"]);
		}
		else
		{
			return redirect()->route('admin.supplier.list')->with(['flash_level'=>'warning','flash_message'=>"Không thể xóa nhà cung cấp có sản phẩm"]);
		}
	}
	//Lấy danh sách sản phẩm của nhà cung cấp
	public function showProduct($manhacungcap)
	{
		$list=DB::table('sanpham')->join('nhacungcap','nhacungcap.manhacungcap','=','sanpham.manhacungcap')->get();
		return view('admin.supplier.showProduct',compact('list'));
	}
}
