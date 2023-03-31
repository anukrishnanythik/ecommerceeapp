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
   
    public function ordercart()
    {
        return $this->belongsto(Cart::class,'cart_id','cart_id');
    }
}
