<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemohon;


class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'tb_realisasis';
    protected $primaryKey = 'id_realisasi';
    protected $fillable = [
        'realisasi_tujuan',
        'tgl_pulang',
        'jam_pulang',
        'km_akhir',
        'biaya_bbm',
        'biaya_parkir',
        'biaya_tol',
        'biaya_lain_lain',
        'total_realisasi',
        'catatan',
        'id_pemohon', // tambahkan kolom id_pemohon jika ada relasi dengan Pemohon
    ];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
    }
}
