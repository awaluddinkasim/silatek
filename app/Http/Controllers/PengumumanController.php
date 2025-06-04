<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PengumumanRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    protected $pengumumanRepository;

    public function __construct(PengumumanRepository $pengumumanRepository)
    {
        $this->pengumumanRepository = $pengumumanRepository;
    }

    /**
     * Menampilkan halaman pengumuman
     *
     * @return View
     */
    public function index(): View
    {
        return view('pengumuman', [
            'daftarPengumuman' => $this->pengumumanRepository->getPaginated(5)
        ]);
    }
}
