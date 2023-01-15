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

                                    @can('superadmin')
                                        <form method="POST" action="{{ route('users.destroy', $user->contact->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <i class="align-middle" data-feather="delete"></i>
                                            </button>
                                        </form>
                                    @endcan

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
                            <a  data-bs-toggle="modal" data-bs-target="#editEmploymentDetails">
                                <i class="align-middle" data-feather="edit"></i> 
                              </a>
                            <p><b><h5>Company:</h5></b> {{$user->employment_detail->company}}</p>
                            <p><b><h5>Position:</h5></b> {{$user->employment_detail->position}}</p>
                            <p><b><h5>EC number:</h5></b> {{$user->employment_detail->ec_number}}</p>        
                        </div>
                    </div>
                </div>
            </div>    
		</div>
	</div>
        </div>
    </div>
    
    <!-- Edit Employment details modal start-->
  <!-- Modal -->
  <div class="modal fade" id="editEmploymentDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Employment Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('employments.update', $user->employment_detail->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input class="form-control form-control-lg @error('company') is-invalid @enderror" type="text" name="company" value={{$user->employment_detail->name}} />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">EC Number</label>
                    <input class="form-control form-control-lg @error('ec_number') is-invalid @enderror" type="text" name="ec_number" value={{$user->employment_detail->ec_number}} />
                    @error('ec_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input class="form-control form-control-lg @error('position') is-invalid @enderror" type="text" name="position" value={{$user->employment_detail->position}} />
                    @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <input type="hidden" id="user_id" name="user_id" value={{$user->id}}>


                
                <div class="text-center mt-3">
                     {{-- <button type="submit" class="btn btn-lg btn-primary">Add</button> --}}
                </div>
            {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-lg btn-primary">Add</button>
        </form>
        </div>
      </div>
    </div>
  </div>
                            <!-- edit Employment details modal end-->

    @include('layouts.scripts')
</body>

</html>