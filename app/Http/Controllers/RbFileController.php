<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RbFile;
use App\Price;
use App\Payment;
use App\Status;
use App\Destination;
use Mail;
use PDF;
use App\Events\RbFileCreated;


class RbFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with('user', $user);
                          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('rbfiles.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'importer'=>'required',
            'document'=>'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $fileName = time().'.'.$request->document->extension(); 
        $request->document->move(public_path('uploads'), $fileName);

        $rb = new RbFile;

        $rb->importer =  $request->importer;
        $rb->document = $fileName;

        if($request->user !== null )
        {
            $user = User::find($request->user);
        }else {
            $user = Auth::user();
        }

        $rb->user_id = $user->id;
        $rb->save();
        
        $status = new Status;
        $status->file_opened = 1;
        $status->rb_file_id = $rb->id;
        $status->save();

         //add a placeholder to payments table to avoid errors
         $payment = new Payment;
         $payment->rb_file_id = $rb->id;
         $payment->save();

         //add price placeholder to avoid errors
         $price = new Price;
         $price->rb_file_id = $rb->id;
         $price->save();

         //add placeholder to avoid errors
         $destination = new Destination;
         $destination->rb_file_id = $rb->id;
         $destination->save();
        
        return view('home')->with('user', $user)
                                     ->with('rb', $rb);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rb = RbFile::find($id);
        $user = Auth::user();

        return view('rbfiles.show')->with('rb', $rb)
                                    ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rb = RbFile::find($id);
        $user = Auth::user();

        return view('rbfiles.update')->with('rb', $rb)
                                     ->with('user', $user);
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
        $request->validate([
            'import'=>'required',
            'importer'=>'required',
            'supplier' => 'required',
            'description'=>'required',
            'entry_number'=>'required',
            'manifest' => 'required',
            'bill_of_lading'=> 'required',
            'currency' => 'required',
            'value' => 'required',
            'tarrif' => 'required',

        ]);

        $rb = RbFile::find($id);

        //make reference number by concatenating the two values
        $referrence = "RB".$id;
        $rb->ref = $referrence; 
        $rb->entry_number = $request->entry_number; 
        $rb->import = $request->import;  
        $rb->importer = $request->importer;  
        $rb->supplier = $request->supplier;  
        $rb->description = $request->description;  
        $rb->bill_of_lading = $request->bill_of_lading;  
        $rb->tarrif = $request->tarrif;  
        $rb->weight = $request->weight;  
        $rb->quantity_of_boxes = $request->quantity_of_boxes;  
        $rb->manifest = $request->manifest;  
        $rb->container = $request->container;
        $rb->importer = $request->importer;

        $rb->save();

         //add destination address issues
        $destination = Destination::find($rb->destination->id);
        $destination->address1 = $request->address1;
        $destination->address2 = $request->address2;
        $destination->country = $request->country;            
        $destination->rb_file_id = $rb->id;
         
        $destination->save();
        
        //Pricing issues involved 
        if($rb->price === null)
        {
           $price = new Price;

           if ($request->currency === 'usd') {
            $price->us_value = $request->value;
            $price->value_to_show = 'USD'.' '.$request->value;
           }
           if ($request->currency === 'rtgs') {
            $price->rtgs_value = $request->value;
            $price->value_to_show = 'RTGS'.' '.$request->value;
           }
           if ($request->currency === 'pula') {
            $price->pula_value = $request->value;
            $price->value_to_show = 'Pula'.' '.$request->value;
           }
           if ($request->currency === 'rupee') {
            $price->rupee_value = $request->value;
            $price->value_to_show = 'Rupee'.' '.$request->value;
           }
           if ($request->currency === 'gbp') {
            $price->gbp_value = $request->value;
            $price->value_to_show = 'British Pound'.' '.$request->value;
           }
           if ($request->currency === 'cny') {
            $price->cny_value = $request->value;
            $price->value_to_show = 'CNY'.' '.$request->value;

           }
           if ($request->currency === 'euro') {
            $price->euro_value = $request->value;
            $price->value_to_show = 'EURO'.' '.$request->value;
           }
           if ($request->currency === 'rand') {
            $price->rand_value = $request->value;
            $price->value_to_show = 'Rand'.' '.$request->value;
           }
           $price->us_duty = $request->us_duty;
           $price->rtgs_duty = $request->rtgs_duty;
           $price->us_price = $request->us_price;
           $price->rtgs_price = $request->rtgs_price;
           $price->rb_file_id = $rb->id;
        } else {
            $price = Price::find($rb->price->id);

            if ($request->currency === 'usd') {
                $price->us_value = $request->value;
                $price->value_to_show = 'USD'.' '.$request->value;
               }
               if ($request->currency === 'rtgs') {
                $price->rtgs_value = $request->value;
                $price->value_to_show = 'RTGS'.' '.$request->value;
               }
               if ($request->currency === 'pula') {
                $price->pula_value = $request->value;
                $price->value_to_show = 'Pula'.' '.$request->value;
               }
               if ($request->currency === 'rupee') {
                $price->rupee_value = $request->value;
                $price->value_to_show = 'Rupee'.' '.$request->value;

               }
               if ($request->currency === 'gbp') {
                $price->gbp_value = $request->value;
                $price->value_to_show = 'British Pound'.' '.$request->value;

               }
               if ($request->currency === 'cny') {
                $price->cny_value = $request->value;
                $price->value_to_show = 'CNY'.' '.$request->value;

               }
               if ($request->currency === 'euro') {
                $price->euro_value = $request->value;
                $price->value_to_show = 'EURO'.' '.$request->value;

               }
               if ($request->currency === 'rand') {
                $price->rand_value = $request->value;
                $price->value_to_show = 'Rand'.' '.$request->value;

               }
               $price->us_duty = $request->us_duty;
               $price->rtgs_duty = $request->rtgs_duty;
               $price->us_price = $request->us_price;
               $price->rtgs_price = $request->rtgs_price;
               $price->rb_file_id = $rb->id;
        }
    
        $price->save();



        //send email address and text to client 
        $user = $rb->user;

        //duty to be paid determination considering currencies other prices follow suit to avoid confusion in the system 
        if ($request->us_duty === null)
        {
            //duty is in rtgs and everything else
            $duty = "ZWL".$rb->price->rtgs_duty;
            $price = "ZWL".$rb->price->rtgs_price;
            $total = $rb->price->rtgs_duty + $rb->price->rtgs_price;
            $total = "ZWL".$total;
        } else{
            //duty is in usd and everything else
            $duty = "$".$rb->price->us_duty;
            $price = "$".$rb->price->us_price;
            $total = $rb->price->us_duty + $rb->price->us_price;
            $total = "$".$total;
        }
        

        $details = [
            'email' => $user->email, 
            'invoice' => $referrence,
            'date' => $rb->price->created_at,
            'until' => $rb->price->created_at,
            'name' => $user->name,
            'surname' => $user->surname,
            'ref' => $rb->ref,
            'address1' => $rb->destination->address1,
            'address2' => $rb->destination->address2,
            'country' =>  $rb->destination->country,
            'duty'  =>     $duty,
            'service_fee' => $price,
            'total' => $total,
        ];

        event(new RbFileCreated($details));

        $user = Auth::user();
    
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
        $rb = RbFile::find($id);
        $rb->delete();
        $user = Auth::user();

        return view('home')->with('rbs', $rbs)
                            ->with('user', $user);
    }

    public function showAll()
    {
        $rbs = RbFile::paginate(5);
        $user = Auth::user();

        return view('rbfiles.index')->with('rbs', $rbs)
                                    ->with('user', $user);
    }

    public function status(Request $request, $id)
    {
        $rb = RbFile::find($id);
        
        $rb->physical_exam = $request->physical_exam;
        $rb->recieved = $request->recieved;
        $rb->declare_entry = $request->declare_entry;
        $rb->acquital = $request->acquital;

        $rb->save();

        return redirect()->route('rbfiles.all');
    }

    public function search(Request $request)
    {
         // Get the search value from the request
        // $supplier = $request->input('supplier');
        $ref = $request->input('ref');

        // Search in the title and body columns from the posts table
        $rbs = RbFile::where('ref', $ref )
                ->get();
            // ->where('supplier', 'LIKE', "%{$supplier}%")
            // ->orWhere('ref', 'LIKE', "%{$ref}%")
            // ->get();
        
            $user = Auth::user();

        return back()->with('rbs', $rbs)
                      ->with('user', $user);
    }

   
}
