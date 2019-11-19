<?php

namespace Notifier\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * Class User
 * @package Notifier\Models
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
