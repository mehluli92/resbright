<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<link rel="stylesheet" href="{{asset('progress/progress-tracker-master/src/styles/site.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cutive+Mono|Open+Sans:300,400&display=swap">

<link rel="stylesheet" href="{{asset('progress/progress-tracker-master/src/styles/progress-tracker.css')}}">
<body>
	<div class="wrapper">
	
        @include('layouts.sidebar')
    <div class="main">

        @include('layouts.nav')
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                <div class="card ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Rb File tracking</h5>
                        </div>
                        <div class="card-body text-center">
                            <h3>Progress tracking.</h3>

                            <ul class="progress-tracker progress-tracker--text">

                              @if ($rb->status->file_opened == 1)
                              <li class="progress-step is-complete">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-1">
                                  <h5 class="progress-title">Step 1</h5>
                                  Open file.
                                </div>
                              </li>
                              @else
                              <li class="progress-step">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-1">
                                  <h5 class="progress-title">Step 1</h5>
                                  Open file.
                                </div>
                              </li>
                              @endif
                                
                              @if ($rb->status->duty_paid == 1)
                              <li class="progress-step is-complete">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-2">
                                  <h5 class="progress-title">Step 2</h5>
                                  Duty payment.
                                </div>
                              </li>
                              @else
                              <li class="progress-step">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-2">
                                  <h5 class="progress-title">Step 2</h5>
                                  Duty payment.
                                </div>
                              </li> 
                              @endif
                                
                              @if ($rb->status->entry_submitted == 1)
                              <li class="progress-step is-active" aria-current="step">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-3">
                                  <h5 class="progress-title">Step 3</h5>
                                  Entry declaration.
                                </div>
                              </li>
                              @else
                              <li class="progress-step" aria-current="step">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-3">
                                  <h5 class="progress-title">Step 3</h5>
                                  Entry declaration.
                                </div>
                              </li>
                              @endif
                      
                              @if ($rb->status->pe_conducted == 1)
                                <li class="progress-step is-active">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-4">
                                    <h5 class="progress-title">Step 4</h5>
                                    Physical exam.
                                  </div>
                                </li>
                              @else
                              <li class="progress-step">
                                <div class="progress-marker"></div>
                                <div class="progress-text progress-text--dotted progress-text--dotted-4">
                                  <h5 class="progress-title">Step 4</h5>
                                  Physical exam.
                                </div>
                              </li>
                              @endif
                      
                              @if ($rb->status->entry_released == 1)
                                <li class="progress-step is-active">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-5">
                                    <h5 class="progress-title">Step 5</h5>
                                    Release or acquital.
                                  </div>
                                </li>
                              @else
                                <li class="progress-step">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-5">
                                    <h5 class="progress-title">Step 5</h5>
                                    Release or acquital.
                                  </div>
                                </li>
                              @endif
                                
                              @if ($rb->status->entry_dispached == 1)
                                <li class="progress-step is-active">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-6">
                                    <h5 class="progress-title">Step 6</h5>
                                    Dispatched.
                                  </div>
                                </li>
                              @else
                                <li class="progress-step">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-6">
                                    <h5 class="progress-title">Step 6</h5>
                                    Dispatched.
                                  </div>
                                </li>
                              @endif
                                
                              @if ($rb->status->goods_delivered == 1)
                                <li class="progress-step is-active">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-7">
                                    <h5 class="progress-title">Step 7</h5>
                                    Delivered.
                                  </div>
                                </li>
                              @else
                                <li class="progress-step">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-7">
                                    <h5 class="progress-title">Step 7</h5>
                                    Delivered.
                                  </div>
                                </li>
                              @endif
                                
                              @if ($rb->status->file_closed == 1)
                                <li class="progress-step is-active">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-8">
                                    <h5 class="progress-title">Step 8</h5>
                                    Closed.
                                  </div>
                                </li>
                              @else
                                <li class="progress-step">
                                  <div class="progress-marker"></div>
                                  <div class="progress-text progress-text--dotted progress-text--dotted-8">
                                    <h5 class="progress-title">Step 8</h5>
                                    Closed.
                                  </div>
                                </li>
                              @endif
                                
                                
                              </ul>
                         
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="float-right end">
                            <b>Date</b> {{$rb->created_at}} <br>    
                                @if ($rb->import = 1)
                                    IMPORT
                                @else
                                    EXPORT
                                @endif
                            </div>
                            <b>Refference number:</b>  {{$rb->ref}} <br>
                            <b>Entry number:</b>       {{$rb->entry_number}} <br>
                            <b>Status:</b>               {{$rb->status->file_opened}} <br>
                            <b>Supplier:</b>            {{$rb->supplier}} <br>
                            <b>Description:</b>         {{$rb->description}} <br>
                            <b>Bill of lading:</b>       {{$rb->bill_of_lading}} <br>
                            <b>Tarrif:</b>         {{$rb->tarrif}} <br>
                            <b>Value:</b>         {{$rb->price->value_to_show}} <br>
                            <b>Weight:</b>         {{$rb->weight}} <br>
                            <b>No. of Booxex:</b>         {{$rb->quantity_of_boxes}} <br>
                            <b>US Duty:</b>         {{$rb->price->us_duty}} <br>
                            <b>Manifest:</b>         {{$rb->manifest}} <br>
                            <b>Physical exam:</b>         {{$rb->physical_exam}} <br>
                            <b>Container:</b>         {{$rb->container}} <br>
                            <b>Recieved:</b>             {{$rb->recieved}} <br>
                           <hr>
                           <div class="text-center">
                            <h4>Payment details</h4> 
                           </div>
                           <div class="row">
                            <div class="col-4">
                              <b>RTGS:</b> {{$rb->payment->rtgs_price}}
                            </div>
                            <div class="col-4">
                              <b>USD:</b> {{$rb->payment->us_price}}
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-4">
                               <b>USD Duty:</b> {{$rb->payment->us_duty}}
                            </div>
                            <div class="col-4">
                             <b> RTGS Duty:</b> {{$rb->payment->rtgs_duty}}
                            </div>
                           </div>
                        </div>
                       
                    </div>
                </div>
            
               <!--status updates start-->
               @if($user->role == 1)
                  <div class="card">
                    <div class="card-header">
                      <div class="text-center">
                        <h4>Status updates.</h4>
                      </div>
                      <div class="float-right">
                        <a href="" data-bs-toggle="modal" data-bs-target="#updatePayment" class="btn btn-sm btn-secondary">
                          Update Payment
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#status" class="btn btn-sm btn-secondary">
                          Update status
                      </a>
                      </div>
                      {{-- {{$rb->status}} --}}
                      <div class="card-body">
                        <span class="badge text-bg-success">
                          File Open <br>
                          {{$rb->status->file_opened}}
                        </span>
                        <span class="badge text-bg-success">
                          Controls Checked. <br>
                          {{$rb->status->controls_checked}}
                        </span>
                        <span class="badge text-bg-success">
                          Tax clearence. <br>
                          {{$rb->status->controls_checked}}
                        </span>
                        <span class="badge text-bg-success">
                          Worksheet. <br>
                          {{$rb->status->worksheet_done}}
                        </span>
                        <span class="badge text-bg-success">
                          Quote sent. <br>
                          {{$rb->status->quotation_sent}}
                        </span>
                        <span class="badge text-bg-success">
                          Duty. <br>
                          {{$rb->status->duty_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          Entry Submitted. <br>
                          {{$rb->status->entry_submitted}}
                        </span> <br>
                        <span class="badge text-bg-success">
                          Entry Self Assessed. <br>
                          {{$rb->status->entry_self_assessed}}
                        </span> 
                        <span class="badge text-bg-success">
                          Entry Examined. <br>
                          {{$rb->status->entry_examined}}
                        </span>
                        <span class="badge text-bg-success">
                          query raised onvalues. <br>
                          {{$rb->status->query_raised_on_values}}
                        </span>
                        <span class="badge text-bg-success">
                          Query on Classification. <br>
                          {{$rb->status->query_raised_on_classification}}
                        </span>
                        <span class="badge text-bg-success">
                          Physical Exam. <br>
                          {{$rb->status->pe_conducted}}
                        </span>
                        <span class="badge text-bg-success">
                          Query resolved. <br>
                          {{$rb->status->query_resolved}}
                        </span> <br>
                        <span class="badge text-bg-success">
                          Entry Assessed. <br>
                          {{$rb->status->entry_assessed}}
                        </span>
                        <span class="badge text-bg-success">
                          Entry Released. <br>
                          {{$rb->status->entry_released}}
                        </span> 
                        <span class="badge text-bg-success">
                          Entry Acquited. <br>
                          {{$rb->status->entry_acquited}}
                        </span>
                        <span class="badge text-bg-success">
                          Storage Paid. <br>
                          {{$rb->status->storages_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          Dispatched. <br>
                          {{$rb->status->entry_dispached}}
                        </span>
                        <span class="badge text-bg-success">
                          Delivered. <br>
                          {{$rb->status->egoods_delivered}}
                        </span>
                        <span class="badge text-bg-success">
                          Service fee. <br>
                          {{$rb->status->service_fees_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          File Closed. <br>
                          {{$rb->status->file_closed}}
                        </span> <br>

                        <span class="badge text-bg-danger">
                          Last Updated at. <br>
                          {{$rb->status->updated_at}}
                        </span>
                      </div>
                    </div>
                  </div>
               @elseif($user->role == 2)
                  <div class="card">
                    <div class="card-header">
                      <div class="text-center">
                        <h4>Status updates.</h4>
                      </div>
                      <div class="float-right">
                        <a href="" data-bs-toggle="modal" data-bs-target="#updatePayment" class="btn btn-sm btn-secondary">
                          Update Payment
                        </a>
                      </div>
                      {{-- {{$rb->status}} --}}
                      <div class="card-body">
                        <span class="badge text-bg-success">
                          File Open <br>
                          {{$rb->status->file_opened}}
                        </span>
                        <span class="badge text-bg-success">
                          Controls Checked. <br>
                          {{$rb->status->controls_checked}}
                        </span>
                        <span class="badge text-bg-success">
                          Tax clearence. <br>
                          {{$rb->status->controls_checked}}
                        </span>
                        <span class="badge text-bg-success">
                          Worksheet. <br>
                          {{$rb->status->worksheet_done}}
                        </span>
                        <span class="badge text-bg-success">
                          Quote sent. <br>
                          {{$rb->status->quotation_sent}}
                        </span>
                        <span class="badge text-bg-success">
                          Duty. <br>
                          {{$rb->status->duty_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          Entry Submitted. <br>
                          {{$rb->status->entry_submitted}}
                        </span> <br>
                        <span class="badge text-bg-success">
                          Entry Self Assessed. <br>
                          {{$rb->status->entry_self_assessed}}
                        </span> 
                        <span class="badge text-bg-success">
                          Entry Examined. <br>
                          {{$rb->status->entry_examined}}
                        </span>
                        <span class="badge text-bg-success">
                          query raised onvalues. <br>
                          {{$rb->status->query_raised_on_values}}
                        </span>
                        <span class="badge text-bg-success">
                          Query on Classification. <br>
                          {{$rb->status->query_raised_on_classification}}
                        </span>
                        <span class="badge text-bg-success">
                          Physical Exam. <br>
                          {{$rb->status->pe_conducted}}
                        </span>
                        <span class="badge text-bg-success">
                          Query resolved. <br>
                          {{$rb->status->query_resolved}}
                        </span> <br>
                        <span class="badge text-bg-success">
                          Entry Assessed. <br>
                          {{$rb->status->entry_assessed}}
                        </span>
                        <span class="badge text-bg-success">
                          Entry Released. <br>
                          {{$rb->status->entry_released}}
                        </span> 
                        <span class="badge text-bg-success">
                          Entry Acquited. <br>
                          {{$rb->status->entry_acquited}}
                        </span>
                        <span class="badge text-bg-success">
                          Storage Paid. <br>
                          {{$rb->status->storages_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          Dispatched. <br>
                          {{$rb->status->entry_dispached}}
                        </span>
                        <span class="badge text-bg-success">
                          Delivered. <br>
                          {{$rb->status->egoods_delivered}}
                        </span>
                        <span class="badge text-bg-success">
                          Service fee. <br>
                          {{$rb->status->service_fees_paid}}
                        </span>
                        <span class="badge text-bg-success">
                          File Closed. <br>
                          {{$rb->status->file_closed}}
                        </span> <br>

                        <span class="badge text-bg-danger">
                          Last Updated at. <br>
                          {{$rb->status->updated_at}}
                        </span>
                      </div>
                    </div>
                  </div>
               @endif
               <!-- status updates ende-->
            </div>    
		</div>
	</div>
        </div>
    </div>
    

    <!--Add payment modal start-->
    <!-- Modal -->             
                
       
    <!--Add payment modal end-->

    <!--Update paymenyts modal start-->
    <div class="modal fade" id="updatePayment" tabindex="-1" aria-labelledby="updatePayment" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Manually Update payments</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('payments.update', $rb->payment->id)}}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="rb_file_id" name="rb_file_id" value={{$rb->id}}>
                    
                  <div class="mb-3">
                      <label class="form-label">US Service Fee</label>
                      <input class="form-control form-control-lg @error('us_price') is-invalid @enderror" type="number" step="0.01" name="us_price" value={{$rb->payment->us_price}} />
                      @error('us_price') 
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
  
                  <div class="mb-3">
                      <label class="form-label">US Duty</label>
                      <input class="form-control form-control-lg @error('us_duty') is-invalid @enderror" type="number" step="0.01" name="us_duty" value={{$rb->payment->rtgs_duty}} />
                      @error('us_duty')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">RTGS Service Fee</label>
                    <input class="form-control form-control-lg @error('rtgs_price') is-invalid @enderror" type="number" step="0.01" name="rtgs_price" value={{$rb->payment->rtgs_price}} />
                    @error('rtgs_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">RTGS Duty</label>
                  <input class="form-control form-control-lg @error('rtgs_duty') is-invalid @enderror" type="number" step="0.01" name="rtgs_duty" value={{$rb->payment->rtgs_duty}} />
                  @error('rtgs_duty')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
                  
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-lg btn-primary">Add</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!--Update paymenyts modal end-->
    
          <!-- Update Rb File Status modal start-->
  <!-- Modal -->
 @if ($rb !== null)
      
 <div class="modal fade" id="status" tabindex="-1" aria-labelledby="status" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="status">Progress checks.</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
           <div class="container-fluid">
               <form method="post" action="{{ route('status.update', $rb->id)}}">
                   @csrf
                   @method('PUT')

                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="file_opened" type="checkbox" value="1" id="file_opened">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="file_opened">
                               Open
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="controls_checked" type="checkbox" value="1" id="controls_checked">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="controls_checked">
                               Controles checked
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="tax_clearence_valid" type="checkbox" value="1" id="tax_clearence_valid">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="tax_clearence_valid">
                               Tax Clearence valid
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="worksheet_done" type="checkbox" value="1" id="worksheet_done">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="worksheet_done">
                               Work Sheet Done
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="quotation_sent" type="checkbox" value="1" id="quotation_sent">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="quotation_sent">
                              Quotation sent
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_submitted" type="checkbox" value="1" id="entry_submitted">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_submitted">
                               Entry Submited
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_self_assessed" type="checkbox" value="1" id="entry_self_assessed">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_self_assessed">
                              Entry Self Assessed
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_examined" type="checkbox" value="1" id="entry_examined">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_examined">
                              Entry examined
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="duty_paid" type="checkbox" value="1" id="duty_paid">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="duty_paid">
                              Duty Paid
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="query_raised_on_values" type="checkbox" value="1" id="query_raised_on_values">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="query_raised_on_values">
                              Query raised on values.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="appeal_done" type="checkbox" value="1" id="appeal_done">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="appeal_done">
                              Apeal Done.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="query_raised_on_classification" type="checkbox" value="1" id="query_raised_on_classification">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="query_raised_on_classification">
                              Query raised on classification.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="pe_conducted" type="checkbox" value="1" id="pe_conducted">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="pe_conducted">
                             Physical exam done.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="query_resolved" type="checkbox" value="1" id="query_resolved">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="query_resolved">
                              Query resolved.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_assessed" type="checkbox" value="1" id="entry_assessed">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_assessed">
                              Entry Assessed.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_released" type="checkbox" value="1" id="entry_released">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_released">
                              Entry released.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_acquited" type="checkbox" value="1" id="entry_acquited">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_acquited">
                              Entry Acquited.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="storages_paid" type="checkbox" value="1" id="storages_paid">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="storages_paid">
                              Storages paid.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="entry_dispached" type="checkbox" value="1" id="entry_dispached">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="entry_dispached">
                              Entry dispached.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="loaded" type="checkbox" value="1" id="loaded">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="goods_delivered">
                              Goods loaded.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="goods_delivered" type="checkbox" value="1" id="goods_delivered">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="goods_delivered">
                              Goods delivered.
                           </label>
                       </div>
                       <hr>
                   </div>
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="service_fees_paid" type="checkbox" value="1" id="service_fees_paid">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="service_fees_paid">
                              Service fees paid.
                           </label>
                       </div>
                       <hr>
                   </div>
                   
                   <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="file_closed" type="checkbox" value="1" id="file_closed">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="file_closed">
                              Close File.
                           </label>
                       </div> 
                       <hr>
                   </div>
                   
                    <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="duty_pending" type="checkbox" value="1" id="duty_pending">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="duty_pending">
                              Duty Pending
                           </label>
                       </div>
                       <hr>
                   </div>
                   
                    <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="duty_add" type="checkbox" value="1" id="duty_add">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="duty_add">
                              Add Duty
                           </label>
                       </div>
                       <hr>
                   </div>
                   
                    <div class="row">
                       <div class="col-md-3">
                           <input class="form-check-input" name="storage_pending" type="checkbox" value="1" id="storage_pending">
                       </div>
                       <div class="col-md-5 ms-auto"> 
                           <label class="form-check-label" for="duty_pending">
                              Storage Pending
                           </label>
                       </div>
                       <hr>
                   </div>

                   <input type="hidden" id="rb_file_id" name="rb_file_id" value={{$rb->id}}>


           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-lg btn-primary">Update</button>
       </form>
       </div>
     </div>
   </div>
 </div>
@endif
   <!-- Update Rb File Status modal end-->

    @include('layouts.scripts')
<!-- This is just required for the fill path demo. -->
<script src="{{asset('progress/progress-tracker-master/src/scripts/site.js')}}"></script>
</body>

</html>