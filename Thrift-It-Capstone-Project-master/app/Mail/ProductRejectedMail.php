<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Product Rejected',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product_reject',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
