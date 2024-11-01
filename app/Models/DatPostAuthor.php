<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatPostAuthor extends Model
{
    use HasFactory;

    protected $table = "dat_post_authors";

    protected $fillable = [
        'author_id',
        'post_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
