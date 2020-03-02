<?php

namespace App\Jobs;

use App\Mail\EmailForGroupB;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailForGroupB implements ShouldQueue
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
        $email = new EmailForGroupB($this->messageParameters);
        Mail::to($this->messageParameters['email'])->send($email);
    }
}
