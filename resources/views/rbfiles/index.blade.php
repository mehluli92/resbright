<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

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
    <div class="container">
        <div class="row">
            <form action="{{ route('rbfiles.search') }}" method="GET">
                       
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control"  type="text" name="supplier" placeholder="supplier" required/>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Search</button>

                        </div>
                    </div>
                </div> <br>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                <div class="card ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Show all Rb Files</h5>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th class="d-none d-xl-table-cell">Date</th>
                                        <th class="d-none d-xl-table-cell">Ref.</th>
                                        <th class="d-none d-xl-table-cell">Import</th>
                                        <th class="d-none d-xl-table-cell">Supplier</th>
                                        <th class="d-none d-md-table-cell">Paid</th>
                                        <th class="d-none d-md-table-cell">Status</th>
                                        <th class="d-none d-md-table-cell">Description</th>
                                        <th class="d-none d-md-table-cell">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rbs as $rb)
                                    <tr>
                                        <td>{{$rb->id}}</td>
                                        <td class="d-none d-xl-table-cell">{{$rb->created_at}}</td>
                                        <td class="d-none d-xl-table-cell">{{$rb->ref}}</td>
                                        <td  ><span class="badge bg-secondary">{{$rb->import}}</span></td>
                                        <td class="d-none d-xl-table-cell">{{$rb->supplier}}</td>
                                        <td><span class="badge bg-success">{{$rb->payed}}</span></td>
                                        <td><span class="badge bg-success">{{$rb->status->file_opened}}</span></td>
                                        <td class="d-none d-lg-table-cell">{{$rb->description}}</td>
                                        <td class="d-none d-md-table-cell">
                                            <a  href="{{route('rbfiles.show', $rb->id)}}">
                                                <i class="align-middle" data-feather="search"></i> 
                                            </a>
                                            <a href="{{route('rbfiles.edit', $rb->id)}}" class="btn btn-info btn-sm">
                                                Respond
                                            </a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#status" class="btn btn-sm btn-secondary">
                                                Update status
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>    
		</div>
	</div>
        </div>
    </div>
    
    
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

</body>

</html>