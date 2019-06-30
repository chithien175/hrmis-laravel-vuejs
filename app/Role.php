<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Role extends LaratrustRole
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}
