<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use PDF;
use Exception;


class MailController extends Controller
{
    public function index()
    {
        $details = [
            'email' => "nokwaramehluli@gmail.com", 
            'invoice' => '12',
            'date' => '2023-01-09 06:34:51',
            'until' => '2023-10-09 06:34:51',
            'name' => 'Jon',
            'surname' => 'Doe',
            'address1' => '389/9',
            'address2' => '24 hampshire, Harare',
            'country' =>  'Zimbabwe',
            'duty'  =>     '300000',
            'storage_fee' => '200000',
            'service_fee' => '100000',
        ];

        $pdf = PDF::loadView('emails.quotation', $details);
        $fileName = time().'.'.'pdf'; 
        // $pdf->move(public_path('uploads'), $fileName);

        Mail::send('emails.myTestMail', $details, function($message)use($details, $pdf) {
            $message->to($details["email"], $details["email"])
                    ->subject($details["invoice"])
                    ->attachData($pdf->output(), "text.pdf");
                });
        try {
           
           
            dd('Email sent with success');
        } catch (\Throwable $th) {
            //throw $th;
            dd('An error occured');
        }
           

            //Mail::to('menokwsimt@gmail.com')->send(new \App\Mail\MyTestMail($details));

            return response()->json(['Great email sent']);
       
    }

    public function test()
    {
        try {
  
            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
  
            $receiverNumber = "+263782140816";
            $message = "This is testing from menokws.co.zw";
  
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);
  
            dd('SMS Sent Successfully.');
              
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

}
