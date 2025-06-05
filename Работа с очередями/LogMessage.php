<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogMessage implements ShouldQueue
{
    use Queueable;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($message)
    {
         $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::channel('daily')->info("Redis Job: " . $this->message);
    }
}
