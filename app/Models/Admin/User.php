<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Atribut yang dapat diisi.
     */

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atribut yang disembunyikan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
