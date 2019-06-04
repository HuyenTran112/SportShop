<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
use App\nhacungcap;
use App\Cart;
use Session;
class PageController extends Controller
{
    public function getIndex()
    {
     	$sp_khuyenmai=sanpham::where('giakhuyenmai','!=','0')->paginate(4);
		$loai=loaisanpham::all();
        return view('page.trangchu',compact('sp_khuyenmai','loai'));
    }
	public function getRegister()
    {
		$sp_khuyenmai=sanpham::where('giakhuyenmai','!=','0')->paginate(4);
		$loai=loaisanpham::all();
        return view('admin.register',compact('sp_khuyenmai','loai'));
    }
    public function getLoaiSp($maloaisp)
    {
        $loai=loaisanpham::all();
		$sanpham=sanpham::where('trangthai','<>','0')->paginate(4);
		$sp_theoloai=sanpham::where('maloaisp',$maloaisp)->get();
		$sp_khac=sanpham::where('maloaisp','!=',$maloaisp)->paginate(4);
        return view('page.sanpham',compact('loai','sanpham','sp_theoloai','sp_khac'));
    }
	
	public function getChiTiet(Request $req)
    {
		$loai=loaisanpham::all();
		$sanpham=sanpham::where('masp',$req->masp)->first();
        $sp_tuongtu=sanpham::where('maloaisp',$sanpham->maloaisp)->paginate(6);
        return view('page.chitietsanpham',compact('loai','sanpham','sp_tuongtu'));
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
	
	 public function getAddtoCart(Request $req,$masp)
    {
        $sanpham=sanpham::where('masp',$masp)->first();
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->add($sanpham,$masp);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
	public function getDelItemCart($masp)
    {
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($masp);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else {
            Session::forget('cart');
        }
        return redirect()->back();

    }
	
	public function getCheckout()
	{
		$loai=loaisanpham::all();
		return view('page.giohang',compact('loai'));
	}
	public function postCheckout()
	{
		return redirect()->back();
	}
	public function capnhat()
	{
		if(Request::ajax())
		{
			echo "oke";
		}
	}
	
}
