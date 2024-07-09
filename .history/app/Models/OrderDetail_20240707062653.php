<?php

namespace App\Models;

use App\Models\OrderRecipient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(OrderRecipient::class, 'order_recipient_id','user_id','product_id');
    }
}
