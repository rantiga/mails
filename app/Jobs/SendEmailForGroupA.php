<?php

namespace App\Jobs;

use App\Mail\EmailForGroupA;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailForGroupA implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $messageParameters;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($messageParameters)
    {
        $this->messageParameters = $messageParameters;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailForGroupA($this->messageParameters);
        logs()->info("Письмо для {$this->messageParameters['user']} отправлено на email {$this->messageParameters['email']} (Группа отправки - А)");

        //Mail::to($this->messageParameters['email'])->send($email);
    }
}
