<?php

namespace Notifier\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 * @package Notifier\Events
 */
abstract class Event
{
    use SerializesModels;
}
