<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
     public function dashboard()
    {
        $OrderTotal = Order::where('status', 2)->count();
        $OrderTotalPayment = Order::where('status', 2)->sum('total');
        $TotalStock = Product::sum('quantity');
        $OrderToday = Order::where('status', 2)->whereDate('created_at', Carbon::today())->get();
        return view('admin.dashboard.index',compact('OrderTotal','OrderTotalPayment','TotalStock','OrderToday'));
    }
}
