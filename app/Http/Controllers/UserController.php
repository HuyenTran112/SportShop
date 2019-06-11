<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\nguoidung;
use App\Http\Requests\UserRequest;


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
                'email'=>'email|unique:nguoidung,tendangnhap',
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
        $user = new nguoidung;
        $user->tendangnhap = $req->email;
        $user->matkhau = Hash::make($req->password);
        $user->trangthai = 1;
        $user->manhomnguoidung = 1;
        $user->save();

        $customer = new khachhang;
        $customer->tenkh = $req->name;
        $customer->diachi = $req->address;
        $customer->sodt = $req->phone;
        $customer->email = $req->email;
        $customer->manguoidung = $user->id;
        $customer->save();

        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }

    //đăng nhập
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'email',
            'password'=>'min:6|max:20'
        ],
        [
            'email.email'=>'Email không đúng định dạng',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự'
        ]
        );
        $credentials = array('tendangnhap'=>$req->email, 'matkhau'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

}
