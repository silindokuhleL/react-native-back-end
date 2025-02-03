<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'duration',
        'rating',
        'reviews',
        'comments'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
