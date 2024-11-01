<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = "ref_post_categories";

    protected $fillable = [
        'category_name',
        'slug',
        'created_by'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'dat_post_categories')->orderBy('uploaded_at', 'ASC');
    }
}
