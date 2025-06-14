<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Admin;

class AdminLoginController extends Controller
{
     public function login() {
        return view('admin.login.index');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return response()->json(['success' => true, 'message' => 'Logged in successfully']);

        } else {
            return response()->json(['success' => false, 'error' => 'invalid_credentials']);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
