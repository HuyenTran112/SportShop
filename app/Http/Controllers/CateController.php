<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;

class CateController extends Controller
{
     public function getList(){
        $listItem = loaisanpham::select('*')->get();
        return view('admin.cate.list',compact('listItem'));
    }
}
