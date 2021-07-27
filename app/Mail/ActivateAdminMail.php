<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivateAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $userMail;

    public function __construct($data, $userMail)
    {
        $this->data = $data;
        $this->userMail = $userMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'mohamedyossif577@gmail.com';
        $subject = 'Admin Account Activation';
        $name = 'Mohamed Bendary';

        return $this->view('emails.ActivateAdminMail')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'content' => $this->data['content'], 'email' => $this->userMail ]);
    }
}
