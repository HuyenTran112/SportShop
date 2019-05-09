<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
use App\nhacungcap;
class PageController extends Controller
{
    public function getIndex()
    {
     	$sp_khuyenmai=sanpham::where('giakhuyenmai','!=','0')->paginate(4);
		$loai=loaisanpham::all();
        return view('page.trangchu',compact('sp_khuyenmai','loai'));
    }
    public function getLoaiSp($maloaisp)
    {
        $loai=loaisanpham::all();
		$sanpham=sanpham::where('trangthai','<>','0')->paginate(4);
		$sp_theoloai=sanpham::where('maloaisp',$maloaisp)->get();
		$sp_khac=sanpham::where('maloaisp','!=',$maloaisp)->paginate(4);
        return view('page.sanpham',compact('loai','sanpham','sp_theoloai','sp_khac'));
    }

    public function getLienhe()
    {
		$loai=loaisanpham::all();
        return view('page.lienhe',compact('loai'));
    }
    public function getGioithieu()
    {
		$loai=loaisanpham::all();
        return view('page.gioithieu',compact('loai'));
    }
	public function getBlog()
    {
		$loai=loaisanpham::all();
        return view('page.blog',compact('loai'));
    }
}
