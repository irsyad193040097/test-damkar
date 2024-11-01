<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = "ref_authors";

    protected $fillable = [
        'user_id',
        'name',
        'avatar',
        'place_of_birth',
        'date_of_birth',
        'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
