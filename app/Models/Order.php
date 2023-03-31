<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'order_id';
    protected $guarded = [];

   
    public function orderuser()
    {
        return $this->belongsto(User::class,'user_id','id');
    }
    public function orderproduct()
    {
        return $this->belongsto(Product::class,'product_id','product_id');
    }
}
