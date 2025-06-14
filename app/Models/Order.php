<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected  $table = 'order';
    protected $fillable = [
         'id',
         'user_id', 
         'total',
         'status',
         'created_at',
         'updated_at'
    ];
    public function orderItems()
    {
        return $this->hasMany(MutipleOrderProduct::class, 'order_id');
    }
    public function Users()
    {
        return $this->belongsTo(Saleperson::class, 'user_id');
    }
   
}
