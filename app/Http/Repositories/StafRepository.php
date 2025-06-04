<?php

namespace App\Http\Repositories;

use App\Models\Staf;

class StafRepository
{
  public function getAll()
  {
    return Staf::all();
  }

  public function getById($id)
  {
    return Staf::find($id);
  }

  public function create($data)
  {
    $data['password'] = bcrypt($data['password']);

    return Staf::create($data);
  }

  public function update($id, $data)
  {
    if (array_key_exists('password', $data)) {
      if ($data['password']) {
        $data['password'] = bcrypt($data['password']);
      } else {
        unset($data['password']);
      }
    }

    return Staf::find($id)->update($data);
  }

  public function delete($id)
  {
    return Staf::destroy($id);
  }
}
