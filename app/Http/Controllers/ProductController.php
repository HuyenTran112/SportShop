<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\sanpham;
use App\cthd;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
     //Go to list product page
    public function getList(){
        //$listItem = sanpham::select('*')->get();
		$listItem = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloaisp', '=', 'loaisanpham.maloaisp')->get();
        return view('admin.product.list',compact('listItem'));
    }
	public function getAdd(){
		$count=DB::table('mausac')->where('mamau','!=','1')->count();
		$mausac=DB::table('mausac')->where('mamau','!=','1')->get();
		$count_size=DB::table('size')->where('masize','!=','1')->count();
		$size=DB::table('size')->where('masize','!=','1')->get();
        return view('admin.product.add',compact('mausac','count','count_size','size'));
    }
	//Thêm sản phẩm
    public function postAdd(ProductRequest $request){
		$file_name = $request->file('fImages')->getClientOriginalName();
		$request->file('fImages')->move('../public/image', $file_name);
		//Thêm sản phẩm
     	DB::table('sanpham')->insert(
		['tensp' =>$request->txtName, 'dongia' =>$request->txtPrice, 'giakhuyenmai' =>$request->txtPromotion, 'manhacungcap' =>$request->txtSupplier,'mieuta' =>$request->txtDescription,'hinhanh' =>$file_name,'trangthai'=>'1','maloaisp'=>$request->txtCategory ]
	);
		$product=DB::table('sanpham')->where('tensp',$request->txtName)->first();
		$mausac=DB::table('mausac')->where('mamau','!=','1')->get();
		//Thêm chi tiết sản phẩm, màu sắc
		foreach($mausac as $item_color)
		{
			$color="color".$item_color->mamau;
			if($request->$color != "")
				DB::table('sanpham_mausac')->insert(['masp'=>$product->masp,'mamau'=>$item_color->mamau,'trangthai'=>1]);
		}
		//Thêm chi tiết sản phẩm, size
		$size=DB::table('size')->where('masize','!=','1')->get();
		foreach($size as $item_size)
		{
			$size="size".$item_size->masize;
			//echo $size;
			if($request->$size != "")
				DB::table('sanpham_size')->insert(['masp'=>$product->masp,'masize'=>$item_size->masize,'trangthai'=>1]);
		}
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>"Thêm sản phẩm thành công"]);
	}
	//Cập nhật sản phẩm
	public function getEdit($masp)
	{
		$mausac=DB::table('mausac')->where('mamau','!=','1')->get();
		$size=DB::table('size')->where('masize','!=','1')->get();
		$item=DB::table('sanpham')->join('loaisanpham','sanpham.maloaisp','=','loaisanpham.maloaisp')->where('masp','=',$masp)->first();
		return view('admin.product.edit',compact('item','mausac','size'));
	}
	public function postEdit($masp, Request $req){
		if(($req->status)=="on")
			$trangthai=1;
		else
			$trangthai=0;
		if($req->file('fImages')==null)
		DB::table('sanpham')
            ->where('masp', $masp)
            ->update(['tensp'=>$req->txtName,
			'dongia'=>$req->txtPrice,
			'giakhuyenmai'=>$req->txtPromotion,
			'mieuta'=>$req->txtDescription,
			'trangthai'=>$trangthai,
			'maloaisp' => $req->txtCategory,
			'manhacungcap'=>$req->txtSupplier
			]);
		else
		{
			$file_name = $req->file('fImages')->getClientOriginalName();
			DB::table('sanpham')
            ->where('masp', $masp)
            ->update(['tensp'=>$req->txtName,
			'dongia'=>$req->txtPrice,
			'giakhuyenmai'=>$req->txtPromotion,
			'mieuta'=>$req->txtDescription,
			'trangthai'=>$trangthai,
			'maloaisp' => $req->txtCategory,
			'manhacungcap'=>$req->txtSupplier,
			'hinhanh'=>$file_name]);
		}
		$mausac=DB::table('mausac')->where('mamau','!=','1')->get();
		//Thêm chi tiết sản phẩm, màu sắc
		foreach($mausac as $item_color)
		{
			$count=DB::table('sanpham_mausac')->where('masp',$masp)->where('mamau',$item_color->mamau)->count();
			if($count>0)
			{
				$color="color".$item_color->mamau;
				//echo $req->$color;
				if($req->$color != "")
				{
					DB::table('sanpham_mausac')->where('masp',$masp)->where('mamau',$item_color->mamau)->update(['trangthai'=>1]);		
				}
				else
				{
					DB::table('sanpham_mausac')->where('mamau',$item_color->mamau)->where('masp',$masp)->update(['trangthai'=>'0']);				
				}
			}
			else
			{
				$color="color".$item_color->mamau;
				if($req->$color != "")
				{
					DB::table('sanpham_mausac')->insert(['masp'=>$masp,'mamau'=>$item_color->mamau,'trangthai'=>1]);
				}
			}
		}
		//Thêm chi tiết sản phẩm, size
		$size=DB::table('size')->where('masize','!=','1')->get();
		foreach($size as $item_size)
		{
			$count=DB::table('sanpham_size')->where('masp',$masp)->where('masize',$item_size->masize)->count();
			if($count>0)
			{
				$s="size".$item_size->masize;
				if($req->$s != "")
				{
					DB::table('sanpham_size')->where('masp',$masp)->where('masize',$item_size->masize)->update(['trangthai'=>1]);		
				}
				else
					DB::table('sanpham_size')->where('masp',$masp)->where('masize',$item_size->masize)->update(['trangthai'=>0]);			
			}
			else
			{
				$s="size".$item_size->masize;
				if($req->$s != "")
				{
					DB::table('sanpham_size')->insert(['masp'=>$masp,'masize'=>$item_size->masize,'trangthai'=>1]);
				}
			}
		}
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật sản phẩm thành công']);
   
		 }
		 
	public function getDelete($masp)
	{
		$countitem=cthd::where('masp',$masp)->count();
		if($countitem==0)
		{
			$product=DB::table('sanpham')->where('masp',$masp)->get();
			DB::table('sanpham')->where('masp',$masp)->delete();
			return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công sản phẩm.']);
		}
		else
		{
			return redirect()->route('admin.product.list')->with(['flash_level'=>'warning','flash_message'=>'Bạn không thể xóa sản phẩm này']);

		}
	}
	

}
