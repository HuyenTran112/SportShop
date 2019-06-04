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
}
