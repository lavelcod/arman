<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * نمایش فرم ورود
     */
    public function login()
    {
        return view('login');
    }

    /**
     * پردازش ورود
     */
    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // تلاش برای ورود
       if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
    $request->session()->regenerate();
    return redirect()->route('admin.index')->with('success', 'با موفقیت وارد شدید.');
}


        return back()->withErrors([
            'name' => 'نام کاربری یا رمز عبور اشتباه است.',
        ])->onlyInput('name');
    }

    /**
     * خروج از سیستم
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'خارج شدید.');
    }
}
