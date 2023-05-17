<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;

    /**
     * Create a new message instance.
     */
    public function __construct($orders)
    {
        //
        $this->orders = $orders;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->from('hello@example.com')->subject('Purchased products')
        ->view('mail.invoice')->with('orders', $this->orders);
      
    }

    /**
     * Get the message content definition.
     */
    

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
