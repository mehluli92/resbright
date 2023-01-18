<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusNotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $infor;
    /**
     * Create a new message instance.
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
                $basic  = new \Nexmo\Client\Credentials\Basic("4d9edfac", "ys0o33ptyZ04Px6T");
                $client = new \Nexmo\Client($basic);
    
                $receiverNumber = $this->infor->mobile;
                $message = $this->infor->message;
  
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);
        } catch (\Throwable $th) {
            // dd("Error: ". $th->getMessage());
            // return back()->with('message', net)
        }

        try {
            return $this->subject($this->infor->email, 'Resbright Investments')
                        ->view('emails.status')->with('infor', $this->infor); 
        } catch (\Throwable $th) {
            dd("email network problem");
        }
              
    }
}
