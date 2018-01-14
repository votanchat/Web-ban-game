<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use Validator;
use App\DonHang;

class UserController extends Controller
{
    public function getDangKy()
    {
    	return view('page.dangky');
    }
    public function getDangNhap()
    {
    	return view('page.dangnhap');
    }
    public function getDangXuat()
    {
    	Auth::logout();
    	return redirect()->back();
    }
    public function postDangKy(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'email'=> 'required|unique:users|email|max:100',
    			'password'=>'required|min:6|max:30',
    			'fullname'=> 'required',
    			're_password'=> 'required|same:password',
                'phone' => 'numeric'
    		],
    		[
    			'email.required' => 'Vui lòng nhập email',
    			'email.email'=>'Không đúng định dạnh email',
    			'email.unique' => 'Email đã có người sử dụng',
    			'password.required'=> 'Vui lòng nhập mật khẩu',
    			'password.min' => 'Mật khẩu không được nhỏ hơn 6 kí tự',
    			'password.max' => 'Mật khẩu không được lơn hơn 30 kí tự',
    			're_password.same' => 'Mật khẩu không giống nhau',
    			'fullname.required' => 'Vui lòng nhập tên',
                'phone.numeric' => 'Số điện thoại phải dạng số'

    		]
    	);
    	$user = new User();
    	$user->diaChi = $Request->adress;
    	$user->email = $Request->email;
    	$user->name = $Request->fullname;
    	$user->password = Hash::make($Request->password);
    	$user->sdt = $Request->phone;
    	$user->save();
    	return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postDangNhap(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'email'=> 'required|email|max:100',
    			'password'=>'required|min:6|max:30',
    		],
    		[
    			'email.required' => 'Vui lòng nhập email',
    			'email.email'=>'Không đúng định dạnh email',
    			'password.required'=> 'Vui lòng nhập mật khẩu',
    			'password.min' => 'Mật khẩu không được nhỏ hơn 6 kí tự',
    			'password.max' => 'Mật khẩu không được lơn hơn 30 kí tự',
    		]
    	);
    	if (Auth::attempt(['email' => $Request->email, 'password' => $Request->password], $Request->has('luu'))) {
    	return redirect()->route('trangchu');
    	}
    	else{
    		return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Đăng nhập không thàng công']);
    	}
    }
    public function getProfile()
    {
        $donhang = DonHang::where('idUser',Auth::user()->id)->get();
        return view('page.profile',compact('donhang'));
    }
    public function postUpdateProfile(Request $Request)
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {

            return Hash::check($value, current($parameters));

        });
        $user = User::find(Auth::user()->id);
        $this->validate($Request,
            [
                'email'=> 'required|email|max:100|unique:users,email,'.$user->id,
                'password'=>'required|old_password:' . $user->password,
                'fullname'=> 'required',
                'phone' => 'numeric'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạnh email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required'=> 'Vui lòng nhập mật khẩu',
                'password.old_password' => 'Sai pass word',
                'fullname.required' => 'Vui lòng nhập tên',
                'phone.numeric' => 'Số điện thoại phải dạng số'
            ]
        );
            $user->diaChi = $Request->adress;
            $user->email = $Request->email;
            $user->name = $Request->fullname;
            $user->sdt = $Request->phone;
            $user->save();
            return redirect()->back()->with('thongbao','Cập nhật thông tin thành công');
    }
    public function postUpdatePassword(Request $Request)
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {

            return Hash::check($value, current($parameters));

        });
        $user = User::find(Auth::user()->id);
        $this->validate($Request,
            [
                'password'=>'required|old_password:' . $user->password,
                'passwordnew'=> 'required|min:6|max:30',
                're_passwordnew'=> 'required|same:passwordnew',
            ],
            [
                'password.required'=> 'Vui lòng nhập mật khẩu',
                'password.old_password' => 'Sai pass word',
                'passwordnew.required'=> 'Vui lòng nhập mật khẩu mới',
                're_passwordnew.required'=> 'Vui lòng nhập lại mật khẩu mới',
                'passwordnew.min' => 'Mật khẩu không được nhỏ hơn 6 kí tự',
                'passwordnew.max' => 'Mật khẩu không được lơn hơn 30 kí tự',
                're_passwordnew.same' => 'Mật khẩu mới không giống nhau',
            ]
        );
            $user->password = Hash::make($Request->passwordnew);
            $user->save();
            return redirect()->back()->with('thongbao','Đổi password thành công');
    }
    public function getDanhSach()
    {
        $dsuser= User::all();
        return view('admin.listuser',compact('dsuser'));
    }
    public function getPassword($id)
    {
        $user=User::find($id);
        return view('admin.capnhatpass',compact('user'));
    }
        public function postPassword($id,Request $Request)
    {
        $user=User::find($id);
        $this->validate($Request,
            [
                'passwordnew'=> 'required|min:6|max:30',
                're_passwordnew'=> 'required|same:passwordnew'
            ],
            [
                'passwordnew.required'=> 'Vui lòng nhập mật khẩu mới',
                're_passwordnew.required'=> 'Vui lòng nhập lại mật khẩu mới',
                'passwordnew.min' => 'Mật khẩu không được nhỏ hơn 6 kí tự',
                'passwordnew.max' => 'Mật khẩu không được lơn hơn 30 kí tự',
                're_passwordnew.same' => 'Mật khẩu mới không giống nhau',
            ]
        );
            $user->password = Hash::make($Request->passwordnew);
            $user->save();
            return redirect()->back()->with('thanhcong','Đổi password thành công');
    }
    public function getXoa($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('thanhcong','Xóa người dùng thành công');
   }
}
