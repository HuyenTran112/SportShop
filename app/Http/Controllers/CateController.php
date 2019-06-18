<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\sanpham;
use App\Http\Requests\CateRequest;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
     public function getList(){
        $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.list',compact('listItem'));
    }
	//Thêm loại sản phẩm
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
	//Cập nhật sản phẩm
	public function getEdit($maloaisp){
        $item = DB::table('loaisanpham')->where('maloaisp', '=',$maloaisp)->first();
        return view('admin.cate.edit', compact('item'));
    }
	public function postEdit($maloaisp, Request $req){
		DB::table('loaisanpham')
            ->where('maloaisp', $maloaisp)
            ->update(['tenloaisp' => $req->txtName]);
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Successfully updated cate product']);
    }
	//Xóa sản phẩm
	public function getDelete($maloaisp){
        $countitem = SanPham::where('maloaisp',$maloaisp)->count();
        if($countitem  == 0){ 
            $cate = DB::table('loaisanpham')
					->where('maloaisp',$maloaisp)->get();
            DB::table('loaisanpham')
			->where('maloaisp',$maloaisp)
			->delete();
            return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Xóa loại sản phẩm thành công']);
        }
        else{
            return redirect()->route('admin.cate.list')->with(['flash_level'=>'warning','flash_message'=>'Bạn không thể xóa loại sản phẩm này']);
     
        }    
    }
	//Xem danh sách sản phẩm của loại sản phẩm
	public function getshowProduct($maloaisp)
	{
		$list=DB::table('sanpham')->where('maloaisp',$maloaisp)->get();
		$tenloaisp=DB::table('loaisanpham')->where('maloaisp',$maloaisp)->select('tenloaisp')->first();
		//dd($tenloaisp);
		return view('admin.cate.showProduct',compact('list','tenloaisp'));
	}
}
