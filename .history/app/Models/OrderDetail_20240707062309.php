<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'product_id',
        'order_maker_id',
        'order_recipient_id',
    ];

    public function recipient(){
        return $this->belongsToMany(OrderRecipient::class,'carts','user_id','product_id');
    }
}
