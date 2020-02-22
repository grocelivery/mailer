<?php

namespace Grocelivery\Mailer\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 * @package Grocelivery\Mailer\Events
 */
abstract class Event
{
    use SerializesModels;
}
