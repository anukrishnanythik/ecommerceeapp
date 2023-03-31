<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';

    protected $guarded = [];

    public function cartuser()
    {
        return $this->belongsto(User::class,'user_id','id');
    }

    public function cartproduct()
    {
        return $this->belongsto(Product::class,'product_id','product_id');
    }
   
}
