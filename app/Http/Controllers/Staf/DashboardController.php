<?php

namespace App\Http\Controllers\Staf;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\View\View;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard staf
     *
     * @return View
     */

    public function index(): View
    {
        return view('staf.dashboard', [
            'totalMahasiswa' => User::count(),
            'totalPengumuman' => Pengumuman::count(),
            'daftarProdi' => Prodi::all(),
            'pengumumanTerbaru' => Pengumuman::latest()->limit(5)->get()
        ]);
    }
}
