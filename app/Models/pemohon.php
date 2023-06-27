<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $table = 'tb_pemohons';
    protected $primaryKey = 'id_pemohon';
    protected $fillable = [
        'nama_pemohon',
        'jabatan',
        'bagian',
        'nama_driver',
        'tgl_penggunaan',
        'tgl_pengembalian',
        'jam_penggunaan',
        'jam_pengembalian',
        'jenis',
        'no_polisi',
        'km_awal',
        'tujuan',
        'estimasi_bbm',
        'estimasi_parkir',
        'estimasi_tol',
        'estimasi_lain_lain',
        'total_estimasi',
    ];

    public function realisasi()
    {
        return $this->hasMany(Realisasi::class, 'id_pemohon');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

}
