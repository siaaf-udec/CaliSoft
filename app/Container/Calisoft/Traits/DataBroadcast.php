<?php

namespace App\Container\Calisoft\Traits;

use Illuminate\Notifications\Messages\BroadcastMessage;

/**
 *
 */
trait DataBroadcast
{
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => $this->toArray($notifiable)
        ]);
    }

    abstract public function toArray($notifiable);

}
