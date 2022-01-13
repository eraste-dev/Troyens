<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName    = null;
    public $email       = null;
    public $phone       = null;
    public $subject     = null;
    public $contact_message     = null;

    public $defaultEmail = "keraste38@gmail.com";
    public $name = "TROYENS";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->fullName         = $data['fullName'] ? $data['fullName'] : null;
        $this->email            = $data['email']    ? $data['email']    : null;
        $this->phone            = $data['phone']    ? $data['phone']    : null;
        $this->subject          = $data['subject']  ? $data['subject']  : null;
        $this->contact_message  = $data['message']  ? $data['message']  : null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            "fullName"  => $this->fullName,
            "email" => $this->email,
            "phone" => $this->phone,
            "subject" => $this->subject,
            "contact_message" => $this->contact_message,
        ];
        return $this->from($this->defaultEmail)->view('email.contact', $data);
    }
}
