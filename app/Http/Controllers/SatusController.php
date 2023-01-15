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


class SatusController extends Controller
{
    public function updateStatus(Request $request, $rb_id )
    {
        $status = Status::find($rb_id);

        $rb = RbFile::find($request->rb_file_id);
        $user = $rb->user;

        if ($request->file_opened !== null) {
            $status->file_opened = $request->file_opened;
        }
        if ($request->controls_checked !== null) {
            $status->controls_checked =  $request->controls_checked;
        }
        if ($request->tax_clearence_valid !== null) {
            $status->tax_clearence_valid =  $request->tax_clearence_valid;

        }
        if ($request->worksheet_done !== null) {
            $status->worksheet_done =  $request->worksheet_done;
        }
        if ($request->quotation_sent !== null) {
            $status->quotation_sent =  $request->quotation_sent;
        }
        if ($request->duty_paid !== null) {
            $status->duty_paid =  $request->duty_paid;
            $msg_type = "duty_paid";
            //start duty event
            $message = 'Your duty payment has been recieved';
            event(new DutyPaid($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->entry_submitted !== null) {
            $status->entry_submitted =  $request->entry_submitted;
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Entry has been submitted';
            event(new EntryDeclared($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->entry_self_assessed !== null) {
            $status->entry_self_assessed =  $request->entry_self_assessed;
        }
        if ($request->entry_examined) {
            $status->entry_examined =  $request->entry_examined;
        }
        if ($request->query_raised_on_values !== null) {
            $status->query_raised_on_values =  $request->query_raised_on_values;

        }
        if ($request->query_raised_on_classification !== null) {
            $status->query_raised_on_classification =  $request->query_raised_on_classification;
        }
        if ($request->pe_conducted !== null) {
            $status->pe_conducted =  $request->pe_conducted;

            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Physical Exam has been conducted';
            event(new PhysicalExam($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->query_resolved !== null) {
            $status->query_resolved =  $request->query_resolved;

        }
        if ($request->entry_assessed !== null) {
            $status->entry_assessed =  $request->entry_assessed;

        }
        if ($request->entry_released !== null) {
            $status->entry_released =  $request->entry_released;

        }
        if ($request->entry_acquited !== null) {
            $status->entry_acquited =  $request->entry_acquited;
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your goods have been acquited';
            event(new Acquital($user->name, $user->email, $user->mobile, $message, $msg_type));
        }
       
        if ($request->storages_paid !== null) {
            $status->storages_paid =  $request->storages_paid;

        }
        if ($request->entry_dispached !== null) {
            $status->entry_dispached =  $request->entry_dispached;
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your goods have been dispatched';
            event(new Dispatched($user->name, $user->email, $user->mobile, $message, $msg_type));
        }
        if ($request->goods_delivered !== null) {
            $status->goods_delivered =  $request->goods_delivered;
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Goods have been delivered at our head office';
            event(new Delivered($user->name, $user->email, $user->mobile, $message, $msg_type));

        }
        if ($request->service_fees_paid !== null) {
            $status->service_fees_paid =  $request->service_fees_paid;

        }
        if ($request->file_closed !== null) {
            $status->file_closed =  $request->file_closed;
            $msg_type = "entry_submitted";
            //start duty event
            $message = 'Your Rb File has been closed.';
            event(new Closed($user->name, $user->email, $user->mobile, $message, $msg_type));
        }

        $status->save();
        //send messages for each stat
        

        return redirect()->route('rbfiles.all');
    }
}
