<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Payment;
use App\User;
use App\RbFile;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('home')->with('user', $user);
    }

    public function admin()
    {
        $payments = Payment::all();
        $rtgs_total = 0;
        $usd_total = 0;
        $rtgs_duty_total = 0;
        $us_duty_total = 0;

        if(count($payments) !== 0)
        {
            foreach ($payments as $payment) {
                //Sum payments
                $usd_total = $usd_total + $payment->us_price;
                $rtgs_total = $rtgs_total + $payment->rtgs_price;
                //Sum rtgs payments
                $rtgs_duty_total = $rtgs_duty_total + $payment->rtgs_duty;
                $us_duty_total = $us_duty_total + $payment->us_duty;
            }
        }
        
        //total number of registered users
        $total_users = DB::table('users')->count();

        $unprocessed_rb = DB::table('statuses')->where('goods_delivered', null)->count(); 

        return view('dashboard')->with('usd_total',$usd_total)
                                ->with('rtgs_total',$rtgs_total)
                                ->with('rtgs_duty_total', $rtgs_duty_total)
                                ->with('us_duty_total', $us_duty_total)
                                ->with('total_users', $total_users)
                                ->with('unprocessed_rb', $unprocessed_rb);
    }
}
