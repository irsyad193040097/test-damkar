<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'homes';

    protected $guarded = [
        'id'
    ];
}
