<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDokumenPajak extends Model
{
    use HasFactory;

    protected $table = 'detail_dokumen_pajak';

    protected $fillable = [
        'id_dokumen_pajak',
        'path',
        'nama_dokumen',
    ];
}
