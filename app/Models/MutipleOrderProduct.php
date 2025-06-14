<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutipleOrderProduct extends Model
{
    use HasFactory;
    protected  $table = 'mutiple_order_product';
    protected $fillable = [
         'id',
         'order_id', 
         'user_id',
         'product_id',
         'cart_id',
         'price',
         'quantity',
         'created_at',
         'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
     public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
