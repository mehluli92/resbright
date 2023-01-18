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
    <div class="container">
        <br>
        <div class="row">
            <div class="col-2"></div>
        <div class="card col-8">
            <div class="card-hearder">
                <h2>Respond to RB File for {{$rb->user->name}} {{$rb->user->surname}}.</h2>
                  <a href="{{route('rbfiles.download', $rb->document)}}" class="">Download</a>
                <div class="float-end align-items-end">
                    <a href="{{route('rbfiles.index')}}" class="btn btn-sm btn-secondary">View all Rb Files.</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="m-sm-4">
                    <form method="post" action="{{ route('rbfiles.update', $rb->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="text-center">
                            <h2>Item Details.</h2>
                          </div>

                       <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="import" id="import" value="1" checked>
                        <label class="form-check-label" for="import">
                            Import
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="import" id="import" value="0">
                        <label class="form-check-label" for="import2">
                            Export
                        </label>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Supplier</label>
                                <input class="form-control form-control-lg" type="text" name="supplier" value={{$rb->supplier}} >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input class="form-control form-control-lg" type="text" name="description" value={{$rb->description}} >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Importer</label>
                                <input class="form-control form-control-lg" type="text" name="importer" value={{$rb->importer}} >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Entry Number</label>
                                <input class="form-control form-control-lg" type="text" name="entry_number"  value={{$rb->entry_number}} >
                            </div>
    
                            <div class="mb-3">
                                <label for="manifest">Manifest</label>
                                <textarea name="manifest" class="form-control" value={{$rb->manifest}} id="manifest"></textarea>
                              </div><br>
                            
                            <label for="bill_of_lading">Bill of Lading: {{$rb->bill_of_lading}}</label>
                            <textarea name="bill_of_lading" class="form-control" value={{$rb->bill_of_lading}} id="bill_of_lading">
                            </textarea>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <h2>Charges and tarrifs.</h2>
                            </div>
                            
                            <div class="col-6">
                                <label for="currency"></label>
                                <select class="form-select" aria-label="Default select example" name="currency">
                                    <option selected>Select Currency of Goods value</option>
                                    <option value="rtgs">usd</option>
                                    <option value="rtgs">RTGS</option>
                                    <option value="rands">rands</option>
                                    <option value="pula">pula</option>
                                    <option value="rupees">rupees</option>
                                    <option value="gbp">gbp</option>
                                    <option value="cny">cny</option>
                                    <option value="rupees">rupees</option>
                                    <option value="euro">euro</option>

                                  </select>
                            </div>
                            <div class="col-3">
                                <label class="form-label ">Goods value: 0</label>
                                <input class="form-control" type="number" name="value" value=0 step="0.01"  >
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label ">Tarrif: </label>
                                <input class="form-control" type="number" name="tarrif" value={{$rb->tarrif}} step="0.01"  >
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label ">USD Duty: </label>
                                <input class="form-control" type="number" name="us_duty" value={{$rb->us_duty}} step="0.01"  >
                            </div>
                            <div class="col-6">
                                <label class="form-label ">RTGS Duty: </label>
                                <input class="form-control" type="number" name="rtgs_duty" value={{$rb->rtgs_duty}} step="0.01"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label ">USD Service fee: </label>
                                <input class="form-control" type="number" name="us_price" value={{$rb->us_duty}} step="0.01"  >
                            </div>
                            <div class="col-6">
                                <label class="form-label ">RTGS Service fee: </label>
                                <input class="form-control" type="number" name="rtgs_price" value={{$rb->rtgs_duty}} step="0.01"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Weight</label>
                                <input class="form-control" type="number" name="weight" value={{$rb->weight}} step="0.01" min="0" >
                            </div>
                            <div class="col-6">
                                <label class="form-label ">Number of Boxes</label>
                                <input class="form-control" type="number" name="quantity_of_boxes" value={{$rb->weight}}  min="1" >
                            </div>
                           
                        </div>
                        <hr>
                       
                          <div class="text-center">
                            <h3>Delivery address.</h3>
                            
                                <div class="">
                                    <label for="address1" class="form-label">Address line 1</label>
                                    <input class="form-control form-control-lg" type="text" name="address1"  >
                                </div> <br>
                                <label for="address2" class="form-label">Address line 2</label>
                                <textarea name="address2" class="form-control"  id="address2">
                                </textarea>
                                <br>
                            <div class="">
                                <select class="form-select" aria-label="Default select example" name="country">
                                    <option selected>Country</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Zambia">Zambia</option>
                                  </select>
                            </div>
                            
                          </div>
                         
                        <div class="text-center mt-3">
                             <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
		</div>
	</div>
        </div>
    </div>
    

    @include('layouts.scripts')
</body>

</html>