<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }


    public function build()
    {
        $file = $this->application->cv;
        if ($file != '')
            return $this->subject('Job mail from website')->view('mail.application_request')->attach($file);

        return $this->subject('Job mail from website')->view('mail.application_request');
    }
}
