<?php

namespace Grocelivery\Notifier\Providers;

use Grocelivery\Notifier\Mailables\EmailVerification;
use Illuminate\Support\ServiceProvider;

/**
 * Class MailableServiceProvider
 * @package Grocelivery\Notifier\Providers
 */
class MailableServiceProvider extends ServiceProvider
{
    /** @var array */
    protected $mailables = [
        'emailVerification' => EmailVerification::class
    ];

    public function register(): void
    {
        foreach ($this->mailables as $key => $class) {
            $this->app->bind("mailable.$key", $class);
        }
    }
}