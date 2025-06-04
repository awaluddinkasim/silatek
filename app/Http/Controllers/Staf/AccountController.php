<?php

namespace App\Http\Controllers\Staf;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\StafRepository;

class AccountController extends Controller
{
    protected $stafRepository;

    public function __construct(StafRepository $stafRepository)
    {
        $this->stafRepository = $stafRepository;
    }

    /**
     * Menampilkan halaman account staf.
     *
     * @return View
     */
    public function index(): View
    {
        return view('staf.account', [
            'user' => $this->stafRepository->getById(auth('staf')->user()->id),
        ]);
    }

    /**
     * Mengupdate data akun staf.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:staf,email,' . auth('staf')->user()->id],
        ]);

        $this->stafRepository->update(auth('staf')->user()->id, $data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    /**
     * Mengupdate password staf.
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

        if (!auth('staf')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $this->stafRepository->update(auth('staf')->user()->id, $data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}
