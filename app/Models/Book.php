<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'publisher',
        'cover_image',
        'year',
        'stock',
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
