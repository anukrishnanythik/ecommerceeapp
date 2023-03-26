<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'popular',
        'image'
    ];
    public function categoryproduct()
    {
        return $this->hasMany(Product::class,'category_id','category_id');
    }

}
