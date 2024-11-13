<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\LoginRequest;
use App\Http\Requests\Web\Account\RegisterRequest;
use App\Service\UserService;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function registerForm(){
        return view('accountLayout.registerForm');
    }


    public function registerAction(RegisterRequest $registerRequest){
        $request = $registerRequest->validated();
        
        $acc = $this->userService->register($request);

        if($acc){
            return redirect()->back()->with('success', 'Đăng ký thành công.');
        }
        return redirect()->back()->with('errors', 'Đăng ký không thành công.');
    }

    public function loginForm(){
        return view('accountLayout.loginForm');
    }

    public function loginAction(LoginRequest $loginRequest){
        $request = $loginRequest->validated();
        
        // Thực hiện xác thực
        if(Auth::attempt($request)) {
            
    
            // Khởi tạo phiên làm việc
            $loginRequest->session()->regenerate();
    
            return redirect()->route('home.index');
            
        } else {
            return redirect()->route('account.loginForm')->with('errors', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.loginForm');
    }
}
