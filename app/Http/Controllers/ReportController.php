<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\loaisanpham;
class ReportController extends Controller
{
    public function BaoCaoDoanhThu()
	{
		$list=DB::table('loaisanpham')->get();
		return view('admin.report.bc_doanhthu',compact('list'));
	}
	public function BaoCaoSanPham()
	{
		$list=DB::table('loaisanpham')->get();
		return view('admin.report.bc_sanpham',compact('list'));
	}
	public function printBaoCaoDoanhThu($maloaisp,$ngaybd, $ngaykt)
	{
		$list=DB::table('loaisanpham')->get();
		return view('admin.report.print_bc_sanpham',compact('list'));
		/*select sanpham.masp,tensp, dongia, giakhuyenmai, sum(cthd.soluong) soluongban, sum(thanhtien) as thanhtien
		from sanpham, loaisanpham, cthd, hoadon
		where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd and sanpham.maloaisp='$maloaisp' and ngayhd>='$ngaybd' and ngayhd<='$ngaykt'
		group by sanpham.masp*/
	}
	public function printBaoCaoSanPham()
	{
		
	}
}
