<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class ForgotPwMail extends Mailable
{
    use Queueable, SerializesModels;
    private $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipient)
    {
        $this -> recipient = $recipient;
        // $this -> queue = 'forgotPwEmail';
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('nguyenvien161002@gmail.com', 'FreshMart'),
            replyTo: [
                new Address('nguyenvien161002@gmail.com', 'FreshMart'),
            ],
            subject: 'FreshMart - Lấy lại mật khẩu tài khoản',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.forgotpw',
            with: [
                'id' => $this -> recipient -> id,
                'fullname' => $this -> recipient -> fullname,
                'token' => $this -> recipient -> token,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
