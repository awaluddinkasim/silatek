<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Staf extends Authenticatable
{
    protected $table = 'staf';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    public function checkPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
