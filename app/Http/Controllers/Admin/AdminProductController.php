<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $Product = Product::orderBy('id', 'asc')->paginate(10);
        return view('admin.product.index',compact('Product'));
    }
     public function store(Request $request)
    {
          $Product = new Product();
          $Product->name = $request->name;
          $Product->sku = $request->sku;
          $Product->price = $request->price;
          $Product->quantity = $request->quantity;
          $Product->save();
          return response()->json(['status' => true, 'message' => 'Product Created Request Successfully']);
    }
    public function edit($id)
    { 
        $Product = Product::findOrFail($id);
        if (!$Product) {
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }
        return response()->json([
            'status' => true,
            'message' => [
                'id' => $Product->id,
                'name' => $Product->name,
                'sku' => $Product->sku,
                'price' => $Product->price,
                'quantity' => $Product->quantity,
               
            ]
        ]);
    }
    public function update(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->name = $request->input('name');
        $Product->sku = $request->input('sku');
        $Product->price = $request->input('price');
        $Product->quantity = $request->input('quantity');
        $Product->save();
        return response()->json(['status' => true, 'message' => 'Product Updated Successfully']);
    }
     public function delete($id)
    {
        $Product = Product::find($id);
        if (!$Product) {
            return response()->json(["success" => false, "message" => "Product not found"], 404);
        }
        $Product->delete();
        return response()->json(["success" => true, "message" => "Product Record Successfully Deleted"], 200);
    }
}
