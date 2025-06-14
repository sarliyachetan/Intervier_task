<?php

namespace App\Http\Controllers\Role\Saleperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function index()
    {
        $Product = Product::orderBy('id', 'asc')->get();
        $ProductItem = Product::orderBy('id', 'asc')->count();
        return view('saleperson.product.index',compact('Product','ProductItem'));
    }
}
