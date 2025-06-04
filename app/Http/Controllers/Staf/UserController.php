<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProdiRepository;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $userRepository;
    protected $prodiRepository;

    /**
     * Konstruktor untuk menginisialisasi UserController dengan UserRepository dan ProdiRepository.
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
     * Menampilkan halaman daftar mahasiswa.
     *
     * @return View
     */
    public function index(): View
    {
        return view('staf.mahasiswa', [
            'users' => $this->userRepository->getAll(),
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Menyimpan data mahasiswa baru ke dalam sistem.
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

        return back()->with('success', 'Berhasil menambahkan mahasiswa!');
    }

    /**
     * Menampilkan halaman untuk mengedit data mahasiswa.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('staf.mahasiswa-edit', [
            'user' => $user,
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Memperbarui data mahasiswa yang ada.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:users,nim,' . $user->id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed'],
            'prodi_id' => ['required', 'exists:prodi,id'],
            'no_telp' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'string', 'max:255'],
        ]);

        $this->userRepository->update($user->id, $data);

        return back()->with('success', 'Berhasil mengubah mahasiswa!');
    }

    /**
     * Menghapus data mahasiswa dari sistem.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success', 'Berhasil menghapus mahasiswa!');
    }
}
