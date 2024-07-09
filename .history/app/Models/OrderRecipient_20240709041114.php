<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'comment',
        'country',
        'city',
        'order_maker_id',
    ];

    public function products(){
        return $this->hasMany(OrderDetail::class, 'order_recipient_id','id');
    }
}
