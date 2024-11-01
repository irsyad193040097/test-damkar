<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'dat_pages';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'page_type',
        'parent_id',
        'active',
        'order',
        'created_by',
        'order'
    ];

    public function parent()
    {
        return $this->hasOne(Page::class, 'id', 'parent_id')->orderBy('order');
    }
    
    public function childs()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id')->orderBy('order', 'ASC');
    }
    
    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('order')->get();
    }
}
