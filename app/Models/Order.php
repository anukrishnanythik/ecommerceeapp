<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'cart_id',
        'slug',
        'description',
        'status',
        'popular',
        'image'
    ];
    public function ordercart()
    {
        return $this->belongsto(Cart::class,'cart_id','cart_id');
    }
}