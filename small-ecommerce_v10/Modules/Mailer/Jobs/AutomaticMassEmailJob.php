<?php

namespace Modules\Mailer\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Address;
use Modules\Mailer\Emails\AutomaticMassEmail;

class AutomaticMassEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $subject, $contentView, $data;
    private $email;
    private $fullname;
    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $fullname, $subject, $contentView, mixed $data)
    {
        $this->email = $email;
        $this->fullname = $fullname;
        $this->subject = $subject;
        $this->contentView = $contentView;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to(new Address($this->email,$this->fullname))->send(new AutomaticMassEmail( $this->subject,$this->contentView,$this->data));
    }
}
