<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use Mail;

class ReceiptMail extends Mailable
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
        $pdfDetails = $this->infor;
         $details = [
            'email' => $pdfDetails->email, 
            'message1' => $pdfDetails->message1,
            'message2' => $pdfDetails->message2,
            'ref' => $pdfDetails->ref,
            'mobile' => $pdfDetails->mobile,
            'name' => $pdfDetails->name
        ];

        // try {
        //         $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        //         $client = new \Nexmo\Client($basic);


        //         $message = $client->message()->send([
        //             'to' => $details['mobile'],
        //             'from' => 'Resbright Investments',
        //             'text' => $details['message']
        //         ]);
        // } catch (\Throwable $th) {
  
        // }
        
                // dd($details);

                $pdf = PDF::loadView('emails.reciept', $details);
                $fileName = time().'.'.'pdf'; 
        
            //   try {
            //         Mail::send('emails.paymentTemplates', $details, function($message)use($details, $pdf) {
            //             $message->to($details["email"], $details["email"])
            //                     ->subject($details["mobile"]) 
            //                     ->attachData($pdf->output(), "reciept.pdf");
            //         });
            //     } catch (\Throwable $th) {
            //         // dd('network error');
            //     }
            
            return $this->view('emails.paymentTemplates')
                    ->attachData($pdf->output(), "reciept.pdf");
    }
}
