<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\bill;
use App\Http\Requests\LoginRequest;


use App\khachhang;use Hash;
use Auth;
use Session;

class UserController extends Controller
{
	//Hiện thị danh sách user admin
    public function getList(){
		$id=Auth::user()->id;
        $listItem = DB::table('users')->where('level','!=','0')->where('id','!=',$id)->get();
        return view('admin.user.list',compact('listItem'));
    }
	//Thêm user admin
	public function getAdd(){
        return view('admin.user.add');
    }

    public function postAdd(Request $req){
	$this->validate($req,
            [
                'txtEmail'=>'email|unique:users,email',
                'txtPass'=>'min:6|max:20',
                'txtRePass'=>'same:txtPass',
                'txtTenHienThi'=>'min:3'
            ],
            [
                'txtEmail.email'=>'Không đúng định dạng email',
                'txtEmail.unique'=>'Email đã có người sử dụng',
                'txtRePass.same'=>'Mật khẩu không giống nhau',
                'txtPass.min'=>'Mật khẩu ít nhất 6 kí tự',
                'txtTenHienThi.min'=>'Tên hiện thị ít nhất 3 ký tự'
            ]);
        $username = new user();
        $username->email = $req->txtEmail;
        $username->password = Hash::make($req->txtPass);
        $username->level = $req->rdoLevel;
        $username->tenhienthi=$req->txtTenHienThi;
		$kt=DB::table('users')->insert(['email'=>$req->txtEmail,'password'=>Hash::make($req->txtPass),'level'=>$req->rdoLevel,'tenhienthi'=>$req->TenHienThi]);
        return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Thêm user admin thành công']);
    }
	//Xóa user
	public function getDelete($id){
        $user_current_login = Auth::user()->id;
		$level_current_login = Auth::user()->level;
        $username = DB::table('users')->where('id',$id)->first();
        if(($user_current_login == $id) || ($level_current_login !=1 )|| ($username->level ==1)){
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Bạn không thể xóa user này']);
        }
        else{
    		DB::table('users')->where('id',$id)->delete();
    		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Xóa user thành công']);
    	}
    }
	//Đổi password
	public function getEdit($id){
        $username = DB::table('users')->where('id',$id)->first();
        if ($username->level == 0 || Auth::user()->id != $id ){
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Bạn không thể cập nhật user này']);
        }
    	return view('admin.user.edit',compact('username'));
    }

    public function postEdit($id,Request $req){
	$this->validate($req,
            [
                'txtPass'=>'min:6|max:20',
                'txtRePass'=>'same:txtPass',
                'txtName'=>'min:3'
            ],
            [
                'txtRePass.same'=>'Mật khẩu không giống nhau',
                'txtPass.min'=>'Mật khẩu ít nhất 6 kí tự',
				'txtName.min'=>'Tên hiện thị ít nhất 3 ký tự'
            ]);
        $username = DB::table('users')->where('id',$id)->first();
    	if($req->input('txtPass')) {
            $this->validate($req,
            [
                'txtRePass' => 'same:txtRePass'
            ],
            [
                'txtRePass.same' => 'Mật khẩu không trùng khớp'
            ]);
            $pass = $req->input('txtPass');
            $username->password = Hash::make($pass);
        }
        $username->tenhienthi = $req->txtName;
        DB::table('users')->where('id',$id)->update(['password' => Hash::make($pass)]);
        return	redirect()->route('admin.bill.showBill')->with(['flash_level'=>'success','flash_message'=>'Cập nhật user thành công']);
   
    }
	//Cập nhật user
	public function getEditUser($id){
        $username = DB::table('users')->where('id',$id)->first();
        if ( Auth::user()->id == $id ){
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Bạn không thể cập nhật user này']);
        }
    	return view('admin.user.edit_user',compact('username'));
    }

    public function postEditUser($id,Request $req){
	    $username->tenhienthi = $req->txtName;
        DB::table('users')->where('id',$id)->update(['tenhienthi'=>$req->txtName,'level'=>$req->rdoLevel]);
        return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật user thành công']);
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
        $user->tenhienthi = $customer->tenkh;
        $user->manguoidung = $customer->id;
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
        $credentials = array('email'=>$req->email, 'password'=>$req->password, 'level' => 0);
        $credentialsAdmin = array('email'=>$req->email, 'password'=>$req->password, 'level' => 1);
		 $credentialsAdmin1 = array('email'=>$req->email, 'password'=>$req->password, 'level' => 2);
        if(Auth::attempt($credentials)){
            return redirect()->route('trang-chu');
        }
        else if (Auth::attempt($credentialsAdmin) or Auth::attempt($credentialsAdmin1)){
            return redirect()->route('admin.bill.showBill');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        
    }
    //đăng xuất
    public function getLogout(){
        Auth::logout();
        Session::forget('cart');
        return redirect()->route('trang-chu');
    }
}
