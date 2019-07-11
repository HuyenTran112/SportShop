<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
use App\nhacungcap;
use App\Cart;
use App\khachhang;
use App\hoadon;
use App\cthd;
use App\User;
use Session;
use Auth;
class PageController extends Controller
{
    public function getIndex()
    {
     	$sp_khuyenmai=DB::table('sanpham')->where('giakhuyenmai','!=','0')->where('trangthai','1')->paginate(8);
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
		//$sanpham=sanpham::where('trangthai','1')->paginate(4);
		$sanpham=DB::table('sanpham')->where('trangthai','1')->paginate(4);
		$sp_theoloai=DB::table('sanpham')->where('maloaisp',$maloaisp)->where('trangthai','1')->paginate(8);
		$sp_khac=DB::table('sanpham')->where('maloaisp','!=',$maloaisp)->where('trangthai','1')->paginate(4);
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
	public function getAddtoCart(Request $req, $masp, $mamau, $masize, $soluong)
    {
		$count_color=DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->where('sanpham.masp',$masp)->count();
		$count_size=DB::table('sanpham')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->count();
		if($count_color!=0 and $count_size!=0)
        {
			$sanpham =DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->where('mamau',$mamau)->where('masize',$masize)->select('sanpham.masp','tensp','dongia','giakhuyenmai','mamau','masize','hinhanh')->first();
		}
		else
		{
			if($count_color==0)
				$sanpham =DB::table('sanpham')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->where('masize',$masize)->select('sanpham.masp','tensp','dongia','giakhuyenmai','masize','hinhanh')->first();
			if($count_size==0)
				$sanpham =DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->where('sanpham.masp',$masp)->where('mamau',$mamau)->select('sanpham.masp','tensp','dongia','giakhuyenmai','hinhanh')->first();
			if($count_color==0 and $count_size==0)
				$sanpham =DB::table('sanpham')->where('sanpham.masp',$masp)->select('sanpham.masp','tensp','dongia','giakhuyenmai','hinhanh')->first();
		}
		//dd($sanpham);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        // $cart->add($sanpham, $masp, $mamau, $masize);
        $masp1 = (string)$masp;
        $mamau1 = (string)$mamau;
        $masize1 = (string)$masize;
        $id = $masp1."-".$mamau1."-".$masize1;
        $ma = $id;
        // $id = $masp1.$mamau1.$masize1;
        // $ma = (int)$id;
        $cart->add($sanpham, $ma, $soluong);
        $req->session()->put('cart',$cart);
		// dd($cart);
        echo 'oke';   
        // return redirect()->back();

    }
    
    // public function getIncreaseItemCart(Request $req, $masp)
    // {
    //     $sanpham = sanpham::where('masp',$masp)->first();
    //     $oldCart = Session('cart')?Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($sanpham,$masp);
    //     $req->session()->put('cart',$cart); 
    //     return redirect()->back();

    // }

    public function getIncreaseItemCart(Request $req, $masp, $mamau, $masize)
    {
		$count_color=DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->where('sanpham.masp',$masp)->count();
		$count_size=DB::table('sanpham')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->count();
		if($count_color!=0 and $count_size!=0)
        {
			$sanpham =DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->where('mamau',$mamau)->where('masize',$masize)->select('sanpham.masp','tensp','dongia','giakhuyenmai','mamau','masize','hinhanh')->first();
		}
		else
		{
			if($count_color==0)
				$sanpham =DB::table('sanpham')->join('sanpham_size','sanpham.masp','=','sanpham_size.masp')->where('sanpham.masp',$masp)->where('masize',$masize)->select('sanpham.masp','tensp','dongia','giakhuyenmai','masize','hinhanh')->first();
			if($count_size==0)
				$sanpham =DB::table('sanpham')->join('sanpham_mausac','sanpham.masp','=','sanpham_mausac.masp')->where('sanpham.masp',$masp)->where('mamau',$mamau)->select('sanpham.masp','tensp','dongia','giakhuyenmai','hinhanh')->first();
			if($count_color==0 and $count_size==0)
				$sanpham =DB::table('sanpham')->where('sanpham.masp',$masp)->select('sanpham.masp','tensp','dongia','giakhuyenmai','hinhanh')->first();
		}
		//dd($sanpham);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        // $cart->add($sanpham, $masp, $mamau, $masize);
        $masp1 = (string)$masp;
        $mamau1 = (string)$mamau;
        $masize1 = (string)$masize;
        $id = $masp1."-".$mamau1."-".$masize1;
        $ma = $id;
        // $id = $masp1.$mamau1.$masize1;
        // $ma = (int)$id;
        $cart->increase($sanpham, $ma);
        $req->session()->put('cart',$cart);
        // dd($cart);

        // echo 'oke';   
        return redirect()->back();

    }

    //xóa nhiều
    public function getDelItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        // dd($cart);
        if(count($cart->items) > 0)  
        {
            Session::put('cart', $cart);
        }     
            
        else{
            Session::forget('cart');
        }   
        return redirect()->back();
    }

    // public function getDelItemCart($id){
    //     $oldCart = Session::has('cart') ? Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $cart->removeItem($id);
    //     if(count($cart->items) > 0)  
    //     {
    //         Session::put('cart', $cart);
    //     }     
            
    //     else{
    //         Session::forget('cart');
    //     }   
    //     return redirect()->back();
    // }

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
        if(Session::get('cart'))
        {
        $cart = Session::get('cart');
        
        $bill = new hoadon;
        if(Auth::check())
            $bill->makh = Auth::user()->manguoidung;
        else 
            return redirect()->route('admin.login')->with(['flag'=>'danger','message'=>'Bạn phải đăng nhập để đặt hàng']);
        $phiship = DB::table('phigiaohang')->where('maphi',$req->tinh)->first();

        $bill->ngayhd = date('Y-m-d');
        $bill->diachigiaohang = $req->address;
        $bill->tongtien = $cart->totalPrice;
        $bill->phigiaohang = $phiship->phi;
        $bill->tongthanhtoan = ($cart->totalPrice) + $phiship->phi;
        $bill->trangthai = 0;
        $bill->ghichu = "Họ tên: ". $req->name. ", SĐT: ".$req->phone. ", email: ".$req->email. ". Ghi chú: ".$req->note;
        $bill->save();
        

        foreach ($cart->items as $key => $value) {
            $bill_detail = new cthd;
            $bill_detail->sohd = $bill->id;
            // $bill_detail->masp = $key; Lúc thêm vào cart tạo $bien luu masp ban dau. VD: 311 thì masp=3, vì masize = mamau = 1
            
            $pos = strpos($key, "-");
            if($pos == false)
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đặt hàng thất bại']);
            $bill_detail->masp = (int)substr($key, 0, $pos);

            $bill_detail->soluong = $value['qty'];
            $bill_detail->thanhtien = $value['price'];
            $bill_detail->mamau = $value['mamau'];
            $bill_detail->masize = $value['masize'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with(['flag'=>'success','message'=>'Đặt hàng thành công']);
        // return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
        }
        else 
        return redirect()->back()->with(['flag'=>'danger','message'=>'Giỏ hàng rỗng']);
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
