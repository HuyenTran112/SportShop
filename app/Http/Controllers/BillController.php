<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\hoadon;

class BillController extends Controller
{
    public function getList(){
        //$listItem = hoadon::select('*')->get();
		$listItem = DB::table('hoadon')->join('khachhang', 'khachhang.makh', '=', 'hoadon.makh')->get();
        return view('admin.bill.showBill',compact('listItem'));
    }
	//Hiện thi danh sách chi tiết hóa đơn
	public function getBillDetail($sohd)
	{
		$list=DB::table('cthd')->where('sohd',$sohd)->get();
		return view('admin.bill.showDetail',compact('list'));
	}
	//Xác nhận đơn hàng
	public function getUpdateBill($sohd)
	{
		$item=DB::table('hoadon')->where('sohd',$sohd)->first();
		if($item->trangthai==0)
		{
			DB::table('hoadon')->where('sohd',$sohd)->update(['trangthai' => 1]);
			return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'success','flash_message'=>'Xác nhận đơn hàng thành công']);
		}
		else
		{
			return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'warning','flash_message'=>'Đơn hàng đã được xác nhận.']);
		}	  
	}
	//Thanh toán đơn hàng
	public function getCheckBill($sohd)
	{
		$item=DB::table('hoadon')->where('sohd',$sohd)->first();
		if($item->trangthai==0)
		{
			return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'warning','flash_message'=>'Vui lòng xác nhận đơn hàng trước khi thanh toán']);
		}
		else
		{
			if($item->trangthai==1)
			{
				DB::table('hoadon')->where('sohd',$sohd)->update(['trangthai' => 2]);
				return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'success','flash_message'=>'Thanh toán đơn hàng thành công.']);
			}
			else
			{
				return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'warning','flash_message'=>'Đơn hàng đã đươc thanh toán']);
			}	
		}	
	}
	//Hủy đơn hàng
	public function getDeleteBill($sohd)
	{
		$item=DB::table('hoadon')->where('sohd',$sohd)->first();
		if($item->trangthai==2)
		{
			return 	redirect()->route('admin.bill.showBill')->with(['flash_level'=>'warning','flash_message'=>'Không thể huy đơn hàng đã thanh toán']);		
		}
		else
		{
			DB::table('cthd')->where('sohd',$sohd)->delete();
			DB::table('hoadon')->where('sohd',$sohd)->delete();
			return redirect()->route('admin.bill.showBill')->with(['flash_level'=>'success','flash_message'=>'Hủy đơn hàng thành công']);
			}
	}
	
}
