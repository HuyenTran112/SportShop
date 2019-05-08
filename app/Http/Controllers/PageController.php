<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
class PageController extends Controller
{
    public function getIndex()
    {
     	$sp_khuyenmai=sanpham::all();
        return view('page.trangchu',compact('sp_khuyenmai'));
    }
    public function getLoaiSp()
    {
        //$sp_theoloai=Product::where('id_type',$type)->get();
        
        //$loai=ProductType::all();
        //$loai_sp=ProductType::where('id',$type)->first();
        return view('page.sanpham');
    }
    public function getChitiet()
    {
        return view('page.sanpham');
    }
    public function getLienhe()
    {
        return view('page.lienhe');
    }
    public function getGioithieu()
    {
        return view('page.gioithieu');
    }
	public function getBlog()
    {
        return view('page.blog');
    }
}
