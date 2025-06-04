<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProdiRepository;
use App\Models\Prodi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    protected $prodiRepository;

    /**
     * Konstruktor untuk menginisialisasi instance dari ProdiRepository
     *
     * @param ProdiRepository $prodiRepository
     */
    public function __construct(ProdiRepository $prodiRepository)
    {
        $this->prodiRepository = $prodiRepository;
    }

    /**
     * Menampilkan halaman daftar prodi
     *
     * @return View
     */
    public function index()
    {
        return view('admin.prodi', [
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Membuat prodi baru
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $this->prodiRepository->create($data);

        return back()->with('success', 'Berhasil menambahkan prodi!');
    }

    /**
     * Menghapus prodi
     *
     * @param Prodi $prodi
     * @return RedirectResponse
     */
    public function destroy(Prodi $prodi)
    {
        try {
            $this->prodiRepository->delete($prodi->id);
            return back()->with('success', 'Berhasil menghapus prodi!');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return back()->with('error', 'Tidak dapat menghapus prodi karena ada mahasiswa yang masih mengambil prodi ini.');
            }
            throw $e;
        }

        return back()->with('success', 'Berhasil menghapus prodi!');
    }
}
