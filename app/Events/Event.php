<?php

namespace Grocelivery\Notifier\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 * @package Grocelivery\Notifier\Events
 */
abstract class Event
{
    use SerializesModels;
}
