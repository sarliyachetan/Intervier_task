<?php

namespace App\Http\Controllers\Role\Saleperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Saleperson;

class LoginController extends Controller
{
      public function login() {
        return view('saleperson.login.index');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (Auth::guard('saleperson')->attempt($credentials)) {
            return response()->json(['success' => true, 'message' => 'Logged in successfully']);

        } else {
            return response()->json(['success' => false, 'error' => 'invalid_credentials']);
        }
    }
    public function logout()
    {
        Auth::guard('saleperson')->logout();
        return redirect()->route('saleperson.login');
    }
}
