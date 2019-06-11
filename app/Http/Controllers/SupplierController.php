<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhacungcap;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function getList(){
        $listItem = nhacungcap::select('*')->get();
        return view('admin.supplier.list',compact('listItem'));
    }
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
		return redirect()->route('admin.supplier.list')->with(['flash_level'=>'success','flash_message'=>"Thêm loại nhà cung cấp thành công"]);
	}
}
