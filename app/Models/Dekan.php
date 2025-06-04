<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Dekan extends Authenticatable
{
    protected $table = 'dekan';

    protected $fillable = [
        'nuptk',
        'nama',
        'email',
        'password',
        'jabatan',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function checkPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
