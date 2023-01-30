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
        $url = "https://mobile.esolutions.co.zw/bmg/api/single";

       // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $data = array(
            'originator' =>"Resbright",
            'destination' => $this->infor->mobile,
            'messageText'=> $this->infor->message,
            'messageReference' => "RB_file",
            'messageDate' => " ",
            'messageValidity'=> " ",
            'sendDateTime'=> " ",
        );
        $payload = json_encode($data);

        //options for curl
        $array_options = array(
      
        //set the url option
         CURLOPT_URL=>$url,
      
        //switches the request type from get to post
        CURLOPT_POST=>true,
      
        //attach the encoded string in the post field using CURLOPT_POSTFIELDS
        CURLOPT_POSTFIELDS=>$payload,
      
        //setting curl option RETURNTRANSFER to true 
        //so that it returns the  the response 
        //instead of outputting it 
        CURLOPT_RETURNTRANSFER=>true,
      
        //Using the CURLOPT_HTTPHEADER set the Content-Type to application/json
        CURLOPT_HTTPHEADER=>array('Content-Type:application/json'),
        CURLOPT_USERPWD => "MENOKWSAPI:Rg64FemP"
        );

         //setting multiple options using curl_setopt_array
        curl_setopt_array($ch,$array_options);

        // using curl_exec() is used to execute the POST request
        $resp = curl_exec($ch);

        //decode response to be added
        $final_decoded_data = json_decode($resp);
        
        //close the cURL and load the page
        curl_close($ch);
        
     
        return $this->subject($this->infor->email, 'Resbright Investments')
                        ->view('emails.status')->with('infor', $this->infor); 
        
              
    }
}
