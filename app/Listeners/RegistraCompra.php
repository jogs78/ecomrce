<?php

namespace App\Listeners;

use App\Events\ComprarProducto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class RegistraCompra
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
        Log::channel('registro')->info("se relaizo una compra");
    }
}
