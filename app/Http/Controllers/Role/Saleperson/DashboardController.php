<?php

namespace App\Http\Controllers\Role\Saleperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
     public function dashboard()
    {   $userId = Auth::guard('saleperson')->id();
        $OrderTotal = Order::where('user_id', $userId)
                  ->where('status', 2)
                  ->count();
       
        return view('saleperson.dashboard.index',compact('OrderTotal'));
    }
}
