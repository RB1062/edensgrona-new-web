<?php

namespace App\Mail;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactSubmission $submission;

    public function __construct(ContactSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [
                new Address($this->submission->email, $this->submission->full_name),
            ],
            subject: 'Ny kontaktförfrågan från '.$this->submission->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-submission',
            with: [
                'submission' => $this->submission,
            ],
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        if ($this->submission->hasMedia('attachments')) {
            foreach ($this->submission->getMedia('attachments') as $media) {
                $attachments[] = Attachment::fromPath($media->getPath())
                                           ->as($media->file_name)
                                           ->withMime($media->mime_type);
            }
        }

        return $attachments;
    }
}
