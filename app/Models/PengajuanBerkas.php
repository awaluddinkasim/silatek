<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBerkas extends Model
{
    protected $table = 'pengajuan_berkas';

    protected $fillable = [
        'pengajuan_id',
        'berkas',
        'file',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
