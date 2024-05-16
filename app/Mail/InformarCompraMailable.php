<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\Producto;

class InformarCompraMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $comprador;
    public $vendedor;
    public $que;

    /**
     * Create a new message instance.
     */
    public function __construct( Usuario $comprador, Producto $que)
    {
        $this->comprador = $comprador;
        $this->vendedor = $que->propietario;
        $this->que = $que;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informar Compra Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'correos.informarcompra',
            with: [
                'comprador' => $this->comprador-> nombre . ' ' . $this->comprador->apellido_paterno . ' ' . $this->comprador-> apellido_materno,
                'que' => $this->que->descripcion,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
