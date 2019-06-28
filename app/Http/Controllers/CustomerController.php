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
        //$listItem = DB::table('khachhang')->wherenotin('makh',$list)->get();
		$listItem = DB::table('khachhang')->whereNotIn('makh', function($q){
    $q->select('manguoidung')->from('users');
})->get();
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
