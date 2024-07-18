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

    // protected $table='tableName';//in the data base
    // public $timestamps = false;
    // protected $primaryKey='colomnName';// = 'post_id';

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags');
    }
}
