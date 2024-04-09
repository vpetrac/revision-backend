<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RevisionStartMail extends Mailable
{
    use Queueable, SerializesModels;

    public $revision;

    public function __construct($revision)
    {
        $this->revision = $revision;
    }

    public function build()
    {
        return $this->from('info@revizija.test')
            ->view('emails.revisionStartNotification')
            ->with([
                'revision' => $this->revision,
            ]);
    }
}
