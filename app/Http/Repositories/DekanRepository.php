<?php

namespace App\Http\Repositories;

use App\Models\Dekan;

class DekanRepository
{
  public function getAll()
  {
    return Dekan::all();
  }

  public function getById($id)
  {
    return Dekan::find($id);
  }

  public function create($data)
  {
    $data['password'] = bcrypt($data['password']);

    return Dekan::create($data);
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

    return Dekan::find($id)->update($data);
  }

  public function delete($id)
  {
    return Dekan::destroy($id);
  }
}
