<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resbright</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      </head>
<body>	
   
                  <div class="containter-fluid">
                    <div class="row">
                        <div class="text-center lh-1">
                            {{-- <img src="{{asset('img/icons/resbright.jpg')}}" style="width:40px;height:40px;"> --}}
                            <p class="text text-danger fw-bold fst-italic"> 
                                        International Air, Ocean Freight Forwarding, Customs Clearence, 
                                        Road Freight Consolidations, Customs Consultancy.   
                            </p>
                            <p class="text">
                                Office G1 Domestic terminal,
                                R.G. Mugabe International Airport, Harare <br>
                                resybright@gmail.com, 0772116373

                            </p>
                           
                        </div>

                    </div> <br><br>

                    <div class="row" style="background-color: cadetblue">
                        <div class="col-2"></div>
                        <div class="col-4 fw-bold ">
                            Invoice # {{$invoice}}  <br>
                            Invoice date: {{$date}} <br>
                            Valid until:  {{$date}} 
                        </div>
                        <div class="col-4">
                           <b> Invoiced To:</b>
                       <p class="lh-1">
                        {{$name}}  {{$surname}} <br>
                        {{$address1}} <br>
                        {{$address2}} <br>
                        {{$country}}
                       </p>

                        
                        </div>
                        <div class="col-2"></div>
                       
                    </div> <br> 
                    
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Customs Duty</td>
                                    <td>{{$duty}}</td>
                                  </tr>
                                  <tr>
                                    <td>Service Fee</td>
                                    <td>{{$service_fee}}</td>
                                  </tr>
                                  <tr>
                                    <td>Total</td>
                                    <td>{{$total}}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="col-1"></div>
                        
                    </div> <br>
                    <div class="row">
                        <div class="text-center">
                            <h4>Banking Details</h4>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><b>BANK:</b></div>
                        <div class="col-md-3"><b>ZB BANK</b></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><b>BRANCH:</b></div>
                        <div class="col-md-3"><b>GRANITESIDE</b></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><b>ACC NAME:</b></div>
                        <div class="col-md-3"><b>RESBRIGHT INVESTMENTS</b></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><b>ACC NO:</b></div>
                        <div class="col-md-3"><b>4120298079200</b></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><b>BP NO:</b></div>
                        <div class="col-md-3"><b>0200187660</b></div>
                        <div class="col-md-2"></div>
                    </div>

                    <br><br>
                    <p class="text text-danger text-center">
                        <i>
                            <b>
                                
                            </b>
                        </i>
                    </p>
                    
                  </div>
               
	

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>