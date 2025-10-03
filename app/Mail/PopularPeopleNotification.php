<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class PopularPeopleNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    public $people;

    /**
     * Create a new message instance.
     */
    public function __construct(Collection $people)
    {
        // Don't forget to pray before you start coding!
        $this->people = $people;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Popular People Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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

    public function build()
    {
        return $this->subject('Popular People Alert (> 50 Likes)')
                ->view('emails.popular_people')
                ->with(['people' => $this->people]);
    }
}
