<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags');
    }
}
