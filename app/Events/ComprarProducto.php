<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\Producto;


class ComprarProducto
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comprador;
    public $que;


    /**
     * Create a new event instance.
     */
    public function __construct( Usuario $comprador, Producto $que)
    {
        $this->comprador = $comprador;
        $this->que = $que;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
