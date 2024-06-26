<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SurveyLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;
    public $revision;
    public $url;

    public function __construct($revision, $user, $token, $url)
    {
        $this->user = $user;
        $this->revision = $revision;
        $this->token = $token;
        $this->url = $url;
    }

    public function build()
    {
        return $this->from('info@revizija.test')
                    ->view('emails.surveyLink')
                    ->with([
                        'token' => $this->token,
                        'user' => $this->user,
                        'revision' => $this->revision,
                        'url' => $this->url,
                    ]);
    }
}