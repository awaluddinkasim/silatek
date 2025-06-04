<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProdiRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    protected $userRepository;
    protected $prodiRepository;

    public function __construct(UserRepository $userRepository, ProdiRepository $prodiRepository)
    {
        $this->userRepository = $userRepository;
        $this->prodiRepository = $prodiRepository;
    }

    /**
     * Menampilkan halaman account
     * 
     * @return View
     */
    public function index(): View
    {
        return view('account', [
            'user' => $this->userRepository->getById(auth('user')->user()->id),
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Mengupdate data akun
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nim' => ['required', 'unique:users,nim,' . auth('user')->user()->id],
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . auth('user')->user()->id],
            'prodi_id' => ['required', 'exists:prodi,id'],
            'no_telp' => ['required'],
            'angkatan' => ['required'],
        ]);

        $this->userRepository->update(auth('user')->user()->id, $data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    /**
     * Mengupdate password
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (!auth('user')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $this->userRepository->update(auth('user')->user()->id, $data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}
