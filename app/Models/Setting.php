<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "ref_settings";

    protected $fillable = [
        'logo_1',
        'logo_2',
        'logo_3',
        'office_address',
        'phone',
        'email',
        'fax',
        'facebook',
        'twitter',
        'instagram'

    ];
}
