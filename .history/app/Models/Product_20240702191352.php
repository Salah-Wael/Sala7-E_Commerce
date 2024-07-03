<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image_path',
        'category_name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'carts','user_id','product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
