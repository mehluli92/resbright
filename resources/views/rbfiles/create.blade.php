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
                <h2>Create new File for your imports/exports.</h2>
                <div class="float-end align-items-end">
                    <a href="{{route('rbfiles.index')}}" class="btn btn-sm btn-secondary">View all Rb Files.</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="m-sm-4">
                    <form method="post" action="{{ route('rbfiles.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <h3>Item Details.</h3>
                          </div>

                          <div class="">
                            <label class="form-label">Individual or Company name</label>
                            <input class="form-control form-control-lg" type="text" name="importer" placeholder="Jon Doe or Amazon" />
                        </div> 

                        <label for="document">Select a file:</label>
                        <input class="form-control" type="file" id="document" name="document">
                         
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