<?php

namespace Notifier\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class Job
 * @package Notifier\Jobs
 */
abstract class Job implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
}
