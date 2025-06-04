<?php

namespace App\Http\Repositories;

use App\Models\Pengumuman;

class PengumumanRepository
{
  public function getAll()
  {
    return Pengumuman::all();
  }

  public function getPaginated($perPage)
  {
    return Pengumuman::paginate($perPage);
  }

  public function getById($id)
  {
    return Pengumuman::find($id);
  }

  public function create($data)
  {
    return Pengumuman::create($data);
  }

  public function update($id, $data)
  {
    return Pengumuman::find($id)->update($data);
  }

  public function delete($id)
  {
    return Pengumuman::destroy($id);
  }
}
