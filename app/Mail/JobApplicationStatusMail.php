<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

public function build()
{
    // Mengambil nama role dan tipe pekerjaan (jika ada di database)
    // Contoh output: Data Analyst (IT) - Internship
    $roleName = $this->application->job_vacancy->name ?? 'Position';
    $type = $this->application->job_vacancy->type ?? 'Internship'; 

    $subject = "Your application: {$roleName} - {$type}";

    return $this->subject($subject)
                ->view('emails.job_status')
                ->with([
                    'application' => $this->application,
                ]);
}
}
