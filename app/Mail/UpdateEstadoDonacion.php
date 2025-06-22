<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpdateEstadoDonacion extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $dispositivos;
    /**
     * Create a new message instance.
     */
    public function __construct($email, $dispositivos)
    {
        $this->email = $email;
        $this->dispositivos = $dispositivos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: 'Donación recibida',
            replyTo: env('MAIL_FROM_ADDRESS'),
            tags: ['cbtis150'],
            metadata: [
                'institution' => 'CBTIS150'
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.updateEstadoDonacion',
            with: [
                'dispositivos' => $this->dispositivos,
            ]
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
