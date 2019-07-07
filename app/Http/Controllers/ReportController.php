<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\loaisanpham;
use App\bc_doanhthu;
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
	public function printBaoCaoDoanhThu()
	{
		return view('admin.report.print_bc_doanhthu');
	}
	
}
