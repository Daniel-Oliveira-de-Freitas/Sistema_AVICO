<?php

namespace App\Mail;

use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaleConoscoEmail extends Mailable
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
        return $this->from($this->email['email'])->markdown('mail.fale-conosco-email')->with(
        [
            'nome'=>$this->email['name'],
            'email'=>$this->email['email'],
            'assunto'=>$this->email['message'],
            'telefone'=>$this->email['phone']
        ]);
    }
}
