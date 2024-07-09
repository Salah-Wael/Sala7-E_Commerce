<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function orders(){
        return $this->hasMany(OrderRecipient::class, 'order_recipient_id','id');
    }
}
