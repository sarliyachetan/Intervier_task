<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Saleperson extends Authenticatable
{
    use HasFactory;
     protected  $table = 'saleperson';
    protected $fillable = [
         'id',
         'role_id',
         'name', 
         'email',
         'password',
         'created_at',
         'updated_at'
    ];
}
