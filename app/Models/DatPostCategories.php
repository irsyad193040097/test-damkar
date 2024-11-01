<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatPostCategories extends Model
{
    use HasFactory;

    protected $table = "dat_post_categories";

    protected $fillable = [
        'post_category_id',
        'post_id',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }
}
