<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProdiRepository;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Menyimpan instance dari UserRepository dan ProdiRepository
     *
     * @var UserRepository
     * @var ProdiRepository
     */
    protected $userRepository;
    protected $prodiRepository;

    /**
     * Konstruktor untuk menginisialisasi instance dari UserRepository dan ProdiRepository
     *
     * @param UserRepository $userRepository
     * @param ProdiRepository $prodiRepository
     */
    public function __construct(UserRepository $userRepository, ProdiRepository $prodiRepository)
    {
        $this->userRepository = $userRepository;
        $this->prodiRepository = $prodiRepository;
    }

    /**
     * Menampilkan halaman registrasi
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.register', [
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Membuat user baru
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'prodi_id' => ['required', 'exists:prodi,id'],
            'no_telp' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'string', 'max:255'],
        ]);

        $this->userRepository->create($data);

        return to_route('login')->with('success', 'Anda berhasil terdaftar!');
    }
}
