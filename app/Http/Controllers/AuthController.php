<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
    //    Petugas::create([
    //     'username' => $request->username,
    //     'password' => $request->password
    //     ]);
    //     return redirect()->route('admin.category.index');
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        Petugas::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
    }
    public function signin(Request $request)
    {
        $credential = $request->only('username', 'password');
       if(Auth::guard('petugas')->attempt($credential)){
           return redirect()->route('admin.category.index');
       }else{
        return redirect()->back();
    }

    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}

