<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    // public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags');
    }
}
