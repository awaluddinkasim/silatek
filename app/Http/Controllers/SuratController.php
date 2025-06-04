<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Tampilkan halaman detail surat berdasarkan uuid atau nomor surat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');

            $pengajuan = Pengajuan::where('uuid', $id)->first();

            if ($pengajuan && $pengajuan->surat && $pengajuan->surat->ttd) {
                $surat = $pengajuan->surat;

                return view('surat-detail', [
                    'pengajuan' => $pengajuan,
                    'surat' => $surat,
                ]);
            }

            abort(404, 'Surat tidak ditemukan');
        }

        if ($request->has('nomor')) {
            $nomor = $request->get('nomor');

            foreach (array_keys(config('layanan')) as $layanan) {
                $daftarPengajuan = Pengajuan::where('layanan', $layanan)->get();

                foreach ($daftarPengajuan as $pengajuan) {
                    if (config('layanan')[$layanan]['tipe'] == 'seminar-ta') {
                        if ($pengajuan->surat && ($pengajuan->surat->nomor_sk == $nomor || $pengajuan->surat->nomor_undangan == $nomor)) {
                            return view('surat-detail', [
                                'pengajuan' => $pengajuan,
                                'surat' => $pengajuan->surat,
                            ]);
                        }
                    } else {
                        if ($pengajuan->surat && $pengajuan->surat->nomor == $nomor) {
                            return view('surat-detail', [
                                'pengajuan' => $pengajuan,
                                'surat' => $pengajuan->surat,
                            ]);
                        }
                    }
                }
            }

            abort(404, 'Surat tidak ditemukan');
        }

        return view('surat');
    }
}
