<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $content;
    public $attachment;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content, $attachment = null)
    {
        $this->subjectLine = $subject;
        $this->content = $content;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->subjectLine)
                      ->view('emails.notification');

        if ($this->attachment) {
            $email->attach($this->attachment);
        }

        return $email;
    }
}
