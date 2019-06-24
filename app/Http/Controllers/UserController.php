<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\nguoidung;
use App\User;
// use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;


use App\khachhang;
use Hash;
use Auth;
use Session;

class UserController extends Controller
{
    public function getList(){
        //$listItem = nguoidung::select('*')->get();
		$listItem = DB::table('nguoidung')->join('nhomnguoidung', 'nguoidung.manhomnguoidung', '=', 'nhomnguoidung.manhomnguoidung')->get();
        return view('admin.user.list',compact('listItem'));
    }
	public function getAdd()
	{
		return view('admin.user.add');
	}

    //đăng ký tài khoản
    public function getSignin(){
        return view('admin.register');
    }
    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'email|unique:users,email',
                'password'=>'min:6|max:20',
                're-password'=>'same:password',
                'phone'=>'max:10'
            ],
            [
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                're-password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'phone.max'=>'Số điện thoại không hợp lệ'
            ]);

        $customer = new khachhang;
        $customer->tenkh = $req->name;
        $customer->diachi = $req->address;
        $customer->sodt = $req->phone;
        $customer->email = $req->email;
        $customer->save();

        $user = new User();
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->level = 0;
        $user->tenkh = $customer->tenkh;
        $user->makh = $customer->makh;
        $user->save();

        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }

    //đăng nhập
    public function getLogin(){
        return view('admin.login');
    }
    
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự'
        ]
        );
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            // return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    //đăng xuất
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
}
