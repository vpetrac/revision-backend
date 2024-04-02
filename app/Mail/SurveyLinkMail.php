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
    public $url;

    public function __construct($user, $token, $url)
    {
        $this->user = $user;
        $this->token = $token;
        $this->url = $url;
    }

    public function build()
    {
        return $this->from('noreply@example.com')
                    ->view('emails.surveyLink')
                    ->with([
                        'token' => $this->token,
                        'user' => $this->user,
                        'url' => $this->url,
                    ]);
    }
}