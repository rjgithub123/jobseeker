<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Models\JobSeeker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendRegistrationMail implements ShouldQueue
{
     use Dispatchable, Queueable;

     public JobSeeker $jobseeker;

    /**
     * Create a new job instance.
     */
    public function __construct(JobSeeker $jobseeker)
    {
        $this->jobseeker = $jobseeker;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->jobseeker->email)->send(
           new RegistrationMail($this->jobseeker)
       );
    }
}
