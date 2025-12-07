<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\JobSeeker;

class RegistrationMail extends Mailable
{
    public JobSeeker $jobseeker;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(JobSeeker $jobseeker)
    {
        $this->jobseeker = $jobseeker;
    }

     public function build()
    {
        return $this->subject('Welcome to Job Portal')
            ->view('emails.jobseeker-welcome');
    }

 
}
