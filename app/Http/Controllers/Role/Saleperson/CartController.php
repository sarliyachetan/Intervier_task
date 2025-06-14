<?php

namespace App\Http\Controllers\Role\Saleperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function checkout()
    {
       $userId = Auth::guard('saleperson')->id();
       $Cart = Cart::where('status',1)->where('user_id', $userId)->get();
       $CartTotal = Cart::where('status',1)->where('user_id', $userId)->count();
       return view('saleperson.product.checkout',compact('Cart','CartTotal'));
    }
    public function store(Request $request)
    {
          $Cart = new Cart();
          $Cart->product_id = $request->product_id;
          $Cart->user_id = $request->user_id;
          $Cart->price = $request->price;
          $Cart->quantity = $request->quantity;
          $Cart->save();
          return response()->json(['status' => true, 'message' => 'Cart Created Request Successfully']);
    }
    public function update(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:cart,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $cart = Cart::findOrFail($request->cart_id);
        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json(['status' => true, 'message' => 'Cart quantity updated successfully.']);
    }
    public function remove(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:cart,id',
        ]);
        $cart = Cart::findOrFail($request->cart_id);
        $cart->delete();
        return response()->json(['status' => true, 'message' => 'Item removed from cart successfully.']);
    }

}
