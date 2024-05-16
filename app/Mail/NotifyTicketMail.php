<?php

namespace App\Mail;

use App\Models\Tiket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $tiket_id;

    /**
     * Create a new message instance.
     */
    public function __construct($tiket_id)
    {
        //
        $this->tiket_id = $tiket_id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tiket Baru Helpdesk DIVISI IT PT Wijaya Karya',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $tiket = Tiket::with(['akun.divisi', 'respon'])->findOrFail($this->tiket_id);
        return new Content(
            view: 'mail.tiket_mail',
            with: [
                'tiket' => $tiket
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
