<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPajak extends Model
{
    use HasFactory;

    protected $table = 'dokumen_pajak';

    protected $fillable = [
        'namapajak',
        'nama_panjang',
        'path',
        'icon',
        'icon_anjungan',
        'id_anjungan',
    ];
}
