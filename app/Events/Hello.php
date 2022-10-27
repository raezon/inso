<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Hello implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vacationId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($vacationId)
    {
        $this->vacationId= $vacationId;
    }

    public function broadCastWith(){
        return [
            'vacationId'=> $this->vacationId
        ];
    }

 /*   
    public function broadcastOn()
    {
        return new PrivateChannel('channel');
    }*/

    public function broadcastOn()
    {
        return new PrivateChannel('channel.'.$this->vacationId);
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
