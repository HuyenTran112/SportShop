<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginAdminController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $req){
        $login = array('username'=>$req->username,'password'=>$req->password);
        if(Auth::attempt($login)){
            return redirect()->route('admin.product.list');
        }
        else{
           return redirect()->route('admin.login')->with(['flash_level'=>'danger','flash_message'=>'Please check your account and password again']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return Redirect()->route('index');        
    }

}
