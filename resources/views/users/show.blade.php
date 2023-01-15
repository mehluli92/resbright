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
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Profile</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{asset('img/avatars/avatar.png')}}" alt="User" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            @if ($user !== null)
                            <h5 class="card-title mb-0">{{$user->name}} {{$user->surname}}</h5>
                            <div class="text-muted mb-2">{{$user->role}}</div> 
                            @endif
                            
                            <div>
                                <a  data-bs-toggle="modal" data-bs-target="#editPersonalDetails">
                                    <i class="align-middle" data-feather="edit-3"></i> 
                                </a>
                                @if ($user->contact === null)
                                    
                                @else
                                <form method="POST" action="{{ route('users.destroy', $user->contact->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="align-middle" data-feather="delete"></i>
                                    </button>
                                </form>
                                @endif
                                
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Personal Details</h5>
                            <p><b><h5>Name:</h5></b> {{$user->name}} {{$user->surname}}</p>
                            <p><b><h5>ID number:</h5></b> 58-280313Q26</p>
                            <p><b><h5>Mobile:</h5></b> {{$user->mobile}}</p>
                            <p><b><h5>Date added:</h5></b> {{$user->created_at}}</p>
        
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Contact Details</h5>
  
   
  @if ($user->contact === null)
  <a  data-bs-toggle="modal" data-bs-target="#contactDetails">
    <i class="align-middle" data-feather="plus-square"></i> 
  </a>   
  @else
  <a  data-bs-toggle="modal" data-bs-target="#editContactDetails">
    <i class="align-middle" data-feather="edit"></i> 
  </a>
  @endif
  @include('layouts.modals')
                            @if ($user->contact !== null)
                            
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives at 
                                    <br>
                                    <a href="#">
                                        {{$user->contact->address1}} <br>
                                        {{$user->contact->address2}}</a></li>
                                <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">Menokws</a></li>
                                <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">{{$user->contact->country}}</a></li>
                            </ul>
                            @endif
                            
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Resbright Investments Employment Details</h5> 
                            <p><b><h5>EC number:</h5></b> RB1237</p>
                            <p><b><h5>Employment type:</h5></b> Contract</p>
        
                        </div>
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