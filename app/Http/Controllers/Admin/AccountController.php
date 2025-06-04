<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\AdminRepository;

class AccountController extends Controller
{
    protected $adminRepository;

    /**
     * AccountController constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Menampilkan halaman akun admin
     * @return View
     */
    public function index(): View
    {
        return view('admin.account', [
            'user' => $this->adminRepository->getById(auth('admin')->user()->id),
        ]);
    }

    /**
     * Mengupdate data akun admin
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:admin,email,' . auth('admin')->user()->id],
        ]);

        $this->adminRepository->update(auth('admin')->user()->id, $data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    /**
     * Mengupdate password akun admin
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (!auth('admin')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $this->adminRepository->update(auth('admin')->user()->id, $data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}
