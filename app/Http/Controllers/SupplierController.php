<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhacungcap;

class SupplierController extends Controller
{
    public function getList(){
        $listItem = nhacungcap::select('*')->get();
        return view('admin.supplier.list',compact('listItem'));
    }
}
