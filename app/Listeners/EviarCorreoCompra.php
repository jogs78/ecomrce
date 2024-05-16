<?php

namespace App\Listeners;

use App\Events\ComprarProducto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\InformarCompraMailable;
use Illuminate\Support\Facades\Mail;


class EviarCorreoCompra
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
    public function handle(ComprarProducto $event): void
    {

        Mail::to($event->que->propietario->emailcorreo)
              ->send(new InformarCompraMailable( $event->comprador, $event->que) );
    }
}
