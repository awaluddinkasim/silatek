<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\StafRepository;
use App\Models\Staf;

class StafController extends Controller
{
    protected $stafRepository;

    /**
     * StafController constructor.
     *
     * @param StafRepository $stafRepository
     */
    public function __construct(StafRepository $stafRepository)
    {
        $this->stafRepository = $stafRepository;
    }

    /**
     * Menampilkan halaman staf.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.staf', [
            'users' => $this->stafRepository->getAll(),
        ]);
    }

    /**
     * Menambahkan staf.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staf'],
            'password' => ['required', 'confirmed'],
        ]);

        $this->stafRepository->create($data);

        return back()->with('success', 'Berhasil menambahkan staf!');
    }

    /**
     * Menampilkan halaman edit staf.
     *
     * @param Staf $staf
     * @return View
     */
    public function edit(Staf $staf): View
    {
        return view('admin.staf-edit', [
            'user' => $staf,
        ]);
    }

    /**
     * Mengupdate staf.
     *
     * @param Request $request
     * @param Staf $staf
     * @return RedirectResponse
     */
    public function update(Request $request, Staf $staf): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staf,email,' . $staf->id],
            'password' => ['nullable', 'confirmed'],
        ]);

        $this->stafRepository->update($staf->id, $data);

        return back()->with('success', 'Berhasil mengubah staf!');
    }

    /**
     * Menghapus staf.
     *
     * @param Staf $staf
     * @return RedirectResponse
     */
    public function destroy(Staf $staf): RedirectResponse
    {
        $staf->delete();

        return back()->with('success', 'Berhasil menghapus staf!');
    }
}
