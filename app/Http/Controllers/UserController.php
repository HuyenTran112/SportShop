<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getList(){
        //$listItem = nguoidung::select('*')->get();
		$listItem = DB::table('nguoidung')->join('nhomnguoidung', 'nguoidung.manhomnguoidung', '=', 'nhomnguoidung.manhomnguoidung')->get();
        return view('admin.user.list',compact('listItem'));
    }

}
