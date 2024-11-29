<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(request $request)
    {
        $request->validate([
            'name'=>'required|string|max:250',
            'email'=> 'required|email|max:250|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        user::create([
          'name'=> 'required|string|max:250',
          'email'=> 'required|email|max:250|unique:users',
          'password'=> 'required|min:8|confirmed',
        ]);
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype'=>'admin'
        ]);
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        if ($request->user()->usertype == 'admin'){
            return redirect('admin/dashoard')->withSunccess('you have successfully registered & logged ini');
        }
        return redirect()->intended(route('dashoard'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            if ($request->user()->usertype == 'admin'){
                return redirect('admin/dashboard')->withSuccess('you have successfully logged in!');
        }
    }
    return back()->withErrors([
        'emain' => 'you provided credentials do not match in our records.',
    ])->onlyInput('email');
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')
      ->withSuccess('you have logged out successfuly!');;
}
    //
}
