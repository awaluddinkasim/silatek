<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Models\PersyaratanBerkas;
use Illuminate\Http\Request;

class PersyaratanBerkasController extends Controller
{
    /**
     * Menampilkan daftar persyaratan berkas untuk layanan tertentu.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @return \Illuminate\View\View
     */
    public function index($layanan)
    {
        $daftarBerkas = PersyaratanBerkas::where('layanan', $layanan)->get();

        return view('staf.persyaratan-berkas', [
            'daftarBerkas' => $daftarBerkas,
            'layanan' => $layanan,
        ]);
    }

    /**
     * Menyimpan persyaratan berkas baru untuk layanan tertentu.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $layanan Nama layanan yang diinginkan.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $layanan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        PersyaratanBerkas::create([
            'layanan' => $layanan,
            ...$data,
        ]);

        return back()->with('success', 'Persyaratan berkas berhasil ditambahkan.');
    }

    /**
     * Menghapus persyaratan berkas untuk layanan tertentu.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param \App\Models\PersyaratanBerkas $berkas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($layanan, PersyaratanBerkas $berkas)
    {
        $berkas->delete();

        return back()->with('success', 'Persyaratan berkas berhasil dihapus.');
    }
}
