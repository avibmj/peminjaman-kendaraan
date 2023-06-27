<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    protected $table = 'tb_mobils';
    protected $primaryKey = 'id_mobil';
    protected $fillable = [
        'jenis_mobil',
        'nomor_polisi',
        'kilometer',
    ];

    public function pemohons()
    {
        return $this->hasMany(Pemohon::class, 'id_mobil');
    }

}
