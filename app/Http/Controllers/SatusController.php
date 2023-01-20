<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RbFile;
use App\Status;
use Mail;
use App\Mail\MailNotify;
use App\Events\DutyPaid;
use App\Events\EntryDeclared;
use App\Events\PhysicalExam;
use App\Events\Acquital;
use App\Events\Dispatched;
use App\Events\Delivered;
use App\Events\Closed;
use Illuminate\Support\Facades\Auth;


class SatusController extends Controller
{
    public function updateStatus(Request $request, $rb_id )
    {
         $rb = RbFile::find($rb_id);
        $status = $rb->status;
        $user = $rb->user;

        if ($request->file_opened != null) {
            $status->file_opened = 1;
        }
        if ($request->controls_checked != null) {
            $status->controls_checked =  1;
        }
        if ($request->tax_clearence_valid != null) {
            $status->tax_clearence_valid =  1;

        }
        if ($request->worksheet_done == 1) {
            $status->worksheet_done =  1;
        }
        if ($request->quotation_sent != null) {
            $status->quotation_sent =  1;
        }
        if ($request->duty_paid == 1) {
            $status->duty_paid =  1;
             $status->save();
            $msg_type = "duty_paid";
            //start duty event
            $message = 'Your duty payment has been recieved';
            event(new DutyPaid($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->entry_submitted != null) {
            $status->entry_submitted =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Entry has been submitted';
            event(new EntryDeclared($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->entry_self_assessed != null) {
            $status->entry_self_assessed =  1;
        }
        if ($request->entry_examined) {
            $status->entry_examined =  $request->entry_examined;
        }
        if ($request->query_raised_on_values != null) {
            $status->query_raised_on_values =  1;

        }
        if ($request->query_raised_on_classification != null) {
            $status->query_raised_on_classification =  1;
        }
        if ($request->pe_conducted != null) {
            $status->pe_conducted =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Physical Exam has been conducted';
            event(new PhysicalExam($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->query_resolved != null) {
            $status->query_resolved =  $request->query_resolved;

        }
        if ($request->entry_assessed != null) {
            $status->entry_assessed =  $request->entry_assessed;

        }
        if ($request->entry_released != null) {
            $status->entry_released =  $request->entry_released;

        }
        if ($request->entry_acquited != null) {
            $status->entry_acquited =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your goods have been acquited';
            event(new Acquital($user->name, $user->email, $user->mobile, $message, $msg_type));
        }
       
        if ($request->storages_paid != null) {
            $status->storages_paid =  1;

        }
        if ($request->entry_dispached != null) {
            $status->entry_dispached =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your goods have been dispatched';
            event(new Dispatched($user->name, $user->email, $user->mobile, $message, $msg_type));
        }
        if ($request->goods_delivered != null) {
            $status->goods_delivered =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Goods have been delivered at our head office';
            event(new Delivered($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->service_fees_paid != null) {
            $status->service_fees_paid =  1;

        }
        if ($request->file_closed != null) {
            $status->file_closed =  1;
             $status->save();
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Rb File has been closed.';
            event(new Closed($user->name, $user->email, $user->mobile, $message, $msg_type));
        }

        $status->save();
        //send messages for each status
        
        return redirect()->route('rbfiles.all');
    }
}
