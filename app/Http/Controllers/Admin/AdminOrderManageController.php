<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\MutipleOrderProduct;
use Illuminate\Support\Facades\Auth;

class AdminOrderManageController extends Controller
{
   public function index()
    {
        $Order = Order::where('status', 2)->paginate(10);
        return view('admin.order.index',compact('Order'));
    }
    public function view($id)
    {
          $Order = Order::findOrFail($id);
          $MutipleOrderProduct = MutipleOrderProduct::where('order_id',$Order->id)->paginate(10);
          return view('admin.order.view',compact('Order','MutipleOrderProduct'));
    }
}
