<?php

namespace App\Http\Controllers;
use App\khachhang;
use App\user;
use App\hoadon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getList(){
		//$list=DB::table('users')->select('manguoidung')->get()->toArray();
        //$listuser = DB::table('users')->select('manguoidung')->get();
		$listItem = DB::table('khachhang')->join('users','khachhang.makh','users.manguoidung')->where('level',0)->get();
		
        return view('admin.customer.list',compact('listItem'));
    }
	public function showBill($makh)
	{
		$bill=DB::table('hoadon')->where('makh',$makh)->get();
		return view('admin.customer.showBill',compact('bill'));
	}
	public function KhachHangTiemNang()
	{
		return view('admin.customer.kh_tiemnang');
	}
	
}
