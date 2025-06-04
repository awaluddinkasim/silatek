<?php

namespace App\Http\Repositories;

use App\Models\Admin;

class AdminRepository
{
  public function getAll()
  {
    return Admin::all();
  }

  public function getById($id)
  {
    return Admin::find($id);
  }

  public function create($data)
  {
    $data['password'] = bcrypt($data['password']);

    return Admin::create($data);
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

    return Admin::find($id)->update($data);
  }

  public function delete($id)
  {
    return Admin::destroy($id);
  }
}
