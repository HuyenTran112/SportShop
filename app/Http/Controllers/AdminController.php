<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\admin;
use Hash;
use Auth;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function getList(){
		$listItem = DB::table('admin')->join('level', 'admin.level', '=', 'level.id')->get();
        return view('admin.userAdmin.list',compact('listItem'));
    }
	public function getAdd()
	{
		return view('admin.userAdmin.add');
	}

    
}
