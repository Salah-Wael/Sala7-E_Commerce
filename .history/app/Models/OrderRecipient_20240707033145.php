<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        id	name	email	phone	address	comment	country	city	order_maker_id	created_at	updated_at	

    ]
}
