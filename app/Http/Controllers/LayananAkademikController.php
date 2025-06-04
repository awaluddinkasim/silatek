<?php

namespace App\Http\Controllers;

use App\Models\PersyaratanBerkas;
use Illuminate\Http\Request;

class LayananAkademikController extends Controller
{
    /**
     * Halaman utama untuk layanan akademik. Halaman ini akan menampilkan layanan-layanan yang tersedia
     * untuk mahasiswa. Layanan yang tersedia adalah layanan yang memiliki setidaknya satu
     * persyaratan berkas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $berkas = PersyaratanBerkas::distinct('layanan')->pluck('layanan');

        $layanan = config('layanan');

        foreach ($layanan as $key => $value) {
            if (!in_array($key, $berkas->toArray())) {
                unset($layanan[$key]);
            }
        }

        return view('layanan', [
            'daftarLayanan' => $layanan,
        ]);
    }
}
