<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'qr_code', 'plat_nomor', 'kode_proses', 'masuk', 'keluar'
    ];
}
