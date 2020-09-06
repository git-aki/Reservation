<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class Contactmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $name;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request['email'];
        $this->name = $request['name'];
        $this->body  = $request['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('9e4815a21a-19cbd2@inbox.mailtrap.io')
        ->subject('お問い合わせ')
        ->view('atlantis.contact.mail')
        ->with([
            'email' => $this->email,
            'name' => $this->name,
            'body'  => $this->body,
        ]);
    }
}
