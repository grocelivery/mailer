<?php

namespace Notifier\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

/**
 * Class Authenticate
 * @package Notifier\Http\Middleware
 */
class Authenticate
{
    /**
     * @var Factory
     */
    protected $auth;

    /**
     * @param Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
