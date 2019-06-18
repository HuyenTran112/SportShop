<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
use App\nhacungcap;
use App\Cart;
use App\khachhang;
use App\hoadon;
use App\cthd;
use Session;
class PageController extends Controller
{
    public function getIndex()
    {
     	$sp_khuyenmai=sanpham::where('giakhuyenmai','!=','0')->paginate(8);
        $loai=loaisanpham::all();
        return view('page.trangchu',compact('sp_khuyenmai','loai'));
    }
	// public function getRegister()
    // {
	// 	$sp_khuyenmai=sanpham::where('giakhuyenmai','!=','0')->paginate(4);
	// 	$loai=loaisanpham::all();
    //     return view('admin.register',compact('sp_khuyenmai','loai'));
    // }
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
//giỏ hàng
	public function getAddtoCart(Request $req, $masp)
    {
        $sanpham = sanpham::where('masp',$masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($sanpham,$masp);
        $req->session()->put('cart',$cart);
        echo 'oke';   
        // return redirect()->back();

    }
    
    public function getIncreaseItemCart(Request $req, $masp)
    {
        $sanpham = sanpham::where('masp',$masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($sanpham,$masp);
        $req->session()->put('cart',$cart); 
        return redirect()->back();

    }
    //xóa nhiều
    public function getDelItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0)  
        {
            Session::put('cart', $cart);
        }     
            
        else{
            Session::forget('cart');
        }   
        return redirect()->back();
    }

    //giảm số lượng đi 1 (xóa 1)
    public function getReduceItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 1)  
        {
            Session::put('cart', $cart);
        }     
            
        // else{
        //     Session::forget('cart');
        // }
        // echo 'oke';   
        return redirect()->back();
    }
	
	public function getCheckout()
	{
		$loai=loaisanpham::all();
		return view('page.giohang',compact('loai'));
	}
	public function postCheckout(Request $req)
	{
		$cart = Session::get('cart');

        $bill = new hoadon;
        $bill->makh = 1;
        $bill->ngayhd = date('Y-m-d');
        $bill->diachigiaohang = $req->address;
        $bill->tongtien = $cart->totalPrice;
        $bill->trangthai = 0;
        $bill->ghichu = "Họ tên: ". $req->name. ", SĐT: ".$req->phone. ", email: ".$req->email. ". Ghi chú: ".$req->note;
        $bill->save();
        

        foreach ($cart->items as $key => $value) {
            $bill_detail = new cthd;
            $bill_detail->sohd = $bill->id; //$bill->sohd; Lỗi ở đây, nếu để là $bill->makh thì k lỗi
            $bill_detail->masp = $key;
            $bill_detail->soluong = $value['qty'];
            $bill_detail->thanhtien = $value['price'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

	public function capnhat()
	{
		if(Request::ajax())
		{
			echo "oke";
		}
    }

    //Tìm kiếm
    public function getSearch(Request $req){
        $product = sanpham::where('tensp', 'like', '%'.$req->key.'%' )
                            ->orwhere('dongia', $req->key)
                            // ->get();
                            ->paginate(12);
        $loai=loaisanpham::all();
        return view('page.timkiem', compact('product', 'loai'));
    }

    
}
