<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecommendationDeadlineEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $revision;

    public function __construct($user, $revision)
    {
        $this->revision = $revision;
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('info@revizija.test')
                    ->view('emails.recommendationDeadline')
                    ->with([
                        'user' => $this->user,
                        'revision' => $this->revision,
                    ]);
    }
}