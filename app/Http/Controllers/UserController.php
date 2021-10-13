<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct() {
        @session_start();        
    }    
    public function postlogin(Request $request){
        if($request->username == '' || $request->password == ''){
            return view('auth.login')->with('notice', 'Tài khoản và mật khẩu không được để trống.');
        }

        if($request->username == 'keengtran' && $request->password == '09031999'){
            $_SESSION['home'] = 'home';
            $decription = DB::table('anh_viet')->inRandomOrder()->limit(20)->get();
            return view('engkids.home',compact('decription'));       
        }else{
            return view('auth.login')->with('notice', 'Tài khoản hoặc mật khẩu chưa chính xác.');
        }        
    } 
    
    public function logout(){
        $_SESSION['home'] = '';
        return view('auth.login')->with('notice', 'Bạn đã đăng xuất thành công khỏi hệ thống');
    } 
}
