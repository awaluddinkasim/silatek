<?php

namespace App\Http\Repositories;

use App\Models\Prodi;

class ProdiRepository
{
  public function getAll()
  {
    return Prodi::all();
  }

  public function find($id)
  {
    return Prodi::find($id);
  }

  public function create($data)
  {
    return Prodi::create($data);
  }

  public function delete($id)
  {
    return Prodi::destroy($id);
  }
}
