<?php

namespace App\Listeners;

use App\Events\Laravel\Sanctum\Events\TokenCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastUsedAt
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event)
    {
        $token = $event->token;
        $token->update(['last_used_at' => now()]);
    }
}
