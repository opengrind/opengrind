<?php

namespace App\Mail;

use App\Models\EmailAddress;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public EmailAddress $emailAddress,
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('hello@opengrind.org', 'Regis from OpenGrind'),
            replyTo: [
                new Address('hello@opengrind.org', 'Regis from OpenGrind'),
            ],
            subject: trans('Please confirm your email address'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = URL::temporarySignedRoute(
            'verification.verify', now()->addMinutes(30), [
                'id' => $this->emailAddress->id,
                'hash' => sha1($this->emailAddress->email),
            ]
        );

        return new Content(
            markdown: 'emails.account.verify-email',
            with: [
                'url' => $url,
            ],
        );
    }
}
