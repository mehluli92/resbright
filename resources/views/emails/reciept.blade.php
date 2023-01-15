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
                    </div>
                    <br> <br>
                    <div class="row" style="background-color: cadetblue">
                        <div class="col-2"></div>
                        <div class="col-4 fw-bold ">
                            Reciept # {{$ref}}  <br>
                            Reciept date: 24-12-2022 <br>
                            Valid until: 24-12-2022 
                        </div>
                        <div class="col-4">
                           <b>To:</b>
                       <p class="lh-1">
                        {{$name}} <br>
                       
                       </p>
                         
                        </div>
                        <div class="col-2"></div>    
                    </div>
                    
                    <br><br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                          {{$message1}} <br>
                          {{$message2}}
                        </div>
                        <div class="col-1"></div>
                        
                    </div> <br> <br> <br>
                    <h3>Thank you for your business!</h3>
                    
                  </div>
               
	

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>