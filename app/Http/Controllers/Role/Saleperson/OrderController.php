<?php

namespace App\Http\Controllers\Role\Saleperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\MutipleOrderProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::guard('saleperson')->id();
        $Order = Order::with('orderItems.product')
                  ->where('user_id', $userId)
                  ->where('status', 2)
                  ->paginate(10);
        return view('saleperson.product.order-listing',compact('Order'));
    }
    public function ordernow(Request $request)
    {
        try {
            $userId = Auth::guard('saleperson')->id();
            $total = $request->input('total');
            $cartItems = Cart::where('user_id', $userId)->where('status', 1)->get();
            if ($cartItems->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'Cart is empty.']);
            }
            $order = Order::create([
                'user_id' => $userId,
                'total' => $total,
                'status' => 2, 
            ]);
            foreach ($cartItems as $item) {
                MutipleOrderProduct::create([
                    'order_id'   => $order->id,
                    'user_id'    => $userId,
                    'product_id' => $item->product_id,
                    'cart_id'    => $item->id,
                    'price'      => $item->price,
                    'quantity'   => $item->quantity,
                ]);

                $product = Product::find($item->product_id);
                if ($product && $product->quantity >= $item->quantity) {
                    $product->quantity -= $item->quantity;
                    $product->save();
                }
                $item->status = 2; 
                $item->save();
            }
            return response()->json(['success' => true, 'order_id' => $order->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function exportPdf()
    {
        $userId = Auth::guard('saleperson')->id();
        $Order = Order::with('orderItems.product')
                    ->where('user_id', $userId)
                    ->where('status', 2)
                    ->get();

        $pdf = Pdf::loadView('saleperson.product.order-pdf', compact('Order'));
        return $pdf->download('order-list.pdf');
    }
    public function singleOrderShow()
    {
        $userId = Auth::guard('saleperson')->id();
        $Order = Order::where('user_id', $userId)->where('status', 2)->paginate(10);
        return view('saleperson.order.index',compact('Order'));
    }
    public function view($id)
    {
          $userId = Auth::guard('saleperson')->id();
          $Order = Order::findOrFail($id);
          $MutipleOrderProduct = MutipleOrderProduct::where('order_id',$Order->id)->where('user_id', $userId)->paginate(10);
          return view('saleperson.order.view',compact('Order','MutipleOrderProduct'));
    }


}
