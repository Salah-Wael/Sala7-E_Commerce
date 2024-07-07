<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    quantity	price	product_id	order_maker_id	order_recipient_id
    protected $fillable = [
        'quantity',
        'price',
        'product_id',
        'order_maker_id',
        
    ];
}
