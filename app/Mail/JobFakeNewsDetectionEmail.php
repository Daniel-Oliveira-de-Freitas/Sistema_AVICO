<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobFakeNewsDetectionEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        info($this->email);
        return $this->subject('Notificação da varredura de fake news')
            ->markdown('mail.job-fake-news-detection-email')->with(
                [
                    'noticiasVerificadas' => $this->email ,
                ]);
    }
}
