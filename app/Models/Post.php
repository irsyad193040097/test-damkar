<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements Viewable
{
    use InteractsWithViews;
    use HasFactory;

    protected $table = "dat_posts";

    protected $fillable = [
        'title',
        'slug',
        'uploaded_at',
        'thumbnail',
        'thumbnail_type',
        'description',
        'published_at',
        'is_published',
        'created_by',
        'category_id'
    ];

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function author()
    {
        return $this->belongsTomany(User::class, 'dat_post_authors', 'id', 'author_id');
    }

    public function postAuthors()
    {
        return $this->hasMany(DatPostAuthor::class);
    }

    public function postCategories()
    {
        return $this->hasMany(DatPostCategories::class);
    }
    
    public function category()
    {
        return $this->belongsTomany(PostCategory::class, 'dat_post_categories');
    }
}
