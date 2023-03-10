<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use Mail;
use App\Mail\MailNotify;
use App\Events\PaymentMade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


//manually add payments to the system in case someone pays in cash
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment;

        if ($request->currency === 'rtgs') {
            //process everything in rtgs
            $payment->us_price = $request->price;
            $payment->us_duty = $request->duty; 
            $payment->rb_file_id = $request->rb_file_id;
        } else {
           //process everything in usd
           $payment->rtgs_price = $request->price;
           $payment->rtgs_duty = $request->duty; 
           $payment->rb_file_id = $request->rb_file_id;
        }

        $payment->save();

        $rb = $payment->rb_file();
        
        $rb->paid = 1;
        $rb->save();
        
        $user = Auth::user();

       //return to previous page
       return view('rbfiles.show')->with('rb', $rb)
                                    ->with('user', $user);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);

      
            //process everything in rtgs
            $payment->us_price = $request->us_price;
            $payment->us_duty = $request->us_duty;        
            //process everything in usd
            $payment->rtgs_price = $request->rtgs_price;
            $payment->rtgs_duty = $request->rtgs_duty; 
            $payment->rb_file_id = $request->rb_file_id;
   

        $payment->save();

        $rb = $payment->rb_file;
        //update payment on rb
        $user = $rb->user;
        
        $user = User::find($user->id);
        $r = $payment->rtgs_price + $payment->rtgs_duty;
        $u = $payment->us_price + $payment->us_duty;

        $message1 = "RTGS Payment Recieved total"." "."ZWL".$r;
        $message2 = "USD Payment Recieved total"." "."$".$u;

        //start payment event
        event(new PaymentMade($user->name, $user->email, $user->mobile, $message1, $message2, $rb->ref));

        $user = Auth::user();

       //return to previous page
       return view('rbfiles.show')->with('rb', $rb)
                                    ->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete erroneous payment method
        $payment = Payment::find($id);
        $payment->delete();
        //return back to previous page
    }
    
    public function unpaid()
    {
       $rbs = DB::table('rb_files')->where('paid','==', NULL)->get();
       
        $user = Auth::user();
        return view('rbfiles.unpaid')->with('rbs', $rbs)
                                     ->with('user', $user);
    }
    
     public function paid()
    {
        $rbs = DB::table('rb_files')
                        ->where('paid', '==', 1)
                        ->get();

        $user = Auth::user();
        
        return view('rbfiles.paid')->with('rbs', $rbs)
                                     ->with('user', $user);
    }
}
