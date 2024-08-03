<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    const PATH_UPLOAD = 'avatar';
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->except('avatar');


        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }
        User::query()->create($data);
        return redirect()->route('login')->with('msg', 'Successfully! Create a new user.');
    }

    public function postLogin(Request $request)
    {

        // $data = $request->only('email', 'password');
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // check account
        if (Auth::attempt($data) && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard')->with('msg', 'Đăng nhập thành công!');
        } else if (Auth::attempt($data) && Auth::user()->role == 'member') {
            return redirect()->route('trang-chu')->with('msg', 'Đăng nhập thành công!');
        } {
            return redirect()->back()->with('errLogin1', 'Thông tin không hợp lệ');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}