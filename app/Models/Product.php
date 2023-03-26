<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';

    protected $fillable = [

        'name',
        'slug',
        'category_id',
        'description',
        'originalprice',
        'sellingprice',
        'image',
        'status',
        'quantity',

    ];
    public function productcategory()
    {
        return $this->belongsto(Category::class,'category_id','category_id');
    }
}
