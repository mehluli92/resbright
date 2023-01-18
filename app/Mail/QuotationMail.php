<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use Mail;
use Exception;

class QuotationMail extends Mailable
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
        $pdfDetails = $this->infor->details;
        //  dd($pdfDetails);
        $pdf = PDF::loadView('emails.quotation', $pdfDetails);
        $fileName = time().'.'.'pdf'; 

    //   try {
    //         Mail::send('emails.paymentTemplates', $pdfDetails, function($message)use($pdfDetails, $pdf) {
    //             $message->to($pdfDetails["email"], $pdfDetails["email"])
    //                     ->subject($pdfDetails["invoice"]) 
    //                     ->attachData($pdf->output(), "quotation.pdf");
    //         });

    //   } catch (\Throwable $th) {
    //     // dd('network error');
    //   }
       return $this->view('emails.quoteTemplate')
                    
                    ->attachData($pdf->output(), "quotation.pdf");
    }
}
