<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected  $table = 'cart';
    protected $fillable = [
         'id',
         'user_id', 
         'product_id',
         'price',
         'quantity',
         'status',
         'created_at',
         'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
