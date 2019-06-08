<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\Http\Request\CateRequest;
class CateController extends Controller
{
     public function getList(){
        $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.list',compact('listItem'));
    }
	public function getAdd(){
       // $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.add');
    }
	public function postAdd(CateRequest $request)
	{
		print_r($request->txtCateName);
	}
}
