<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin
     * 
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalMahasiswa' => User::count(),
            'totalPengumuman' => Pengumuman::count(),
            'daftarProdi' => Prodi::all(),
            'pengumumanTerbaru' => Pengumuman::latest()->limit(5)->get()
        ]);
    }
}
