<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratAdministrasi extends Model
{
    protected $table = 'surat_administrasi';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'tahun_ajaran',
        'periode',
        'tanggal_surat',
    ];

    public function ttd()
    {
        return $this->morphOne(Tandatangan::class, 'surat');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
