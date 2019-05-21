<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;

class ProductController extends Controller
{
     //Go to list product page
    public function getList(){
        $listItem = sanpham::select('*')->get();
        return view('admin.product.list',compact('listItem'));
    }

}
