<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Exception;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $infor;

    /**
     * Create a new infor instance.
     *
     * @return void
     */
    public function __construct($infor)
    {
        $this->infor = $infor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       try {
            return $this->subject('Resbright Investments Notification', 'Resbright Investments')
            ->view('emails.registration')->with('message', $this->infor);
       } catch (\Throwable $th) {
            // return back();
       }
    }
}
