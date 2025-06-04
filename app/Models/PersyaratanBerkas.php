<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersyaratanBerkas extends Model
{
    protected $table = 'persyaratan_berkas';

    protected $fillable = [
        'layanan',
        'nama',
        'keterangan',
    ];
}
