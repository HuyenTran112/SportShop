<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\Http\Requests\CateRequest;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
     public function getList(){
        $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.list',compact('listItem'));
    }
	public function getAdd(){
       // $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.add');
    }
	public function postAdd(CateRequest $request)
	{
		$loaisp=new loaisanpham;
		$loaisp->tenloaisp=$request->txtCateName;
		DB::table('loaisanpham')->insert(
		['tenloaisp' =>$request->txtCateName ]
	);
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"Thêm loại sản phẩm thành công"]);
	}
}
