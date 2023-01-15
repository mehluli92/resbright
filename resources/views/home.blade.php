<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
	<div class="wrapper">
	
        @include('layouts.sidebar')
    <div class="main">

        @include('layouts.nav')
                <main class="content">
                    <div class="container-fluid p-0">

                        <div class="mb-3">
                            <h1 class="h3 d-inline align-middle">Your Profile</h1>
                            <a class="badge bg-dark text-white ms-2">
                                Client portal
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Profile Details</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="{{asset('img/avatars/avatar.png')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                        <h5 class="card-title mb-0">{{$user->name}} {{$user->surname}}</h5>
                                        <div class="text-muted mb-2">{{$user->employment_detail->position}}</div>
                                    </div>
                                    
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h5 class="h6 card-title">About</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Resident in <br> <a href="#">
                                                <a  data-bs-toggle="modal" data-bs-target="#editContactDetails">
                                                    <i class="align-middle" data-feather="edit-3"></i> 
                                                </a> <br>
                                               {{$user->contact->address1}} <br>
                                               {{$user->contact->address2}} <br>
                                            </a></li>
                                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <br><a href="#">
                                                
                                            </a></li>
                                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">{{$user->contact->country}}</a></li>
                                        </ul>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h5 class="h6 card-title">Contact</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> {{$user->mobile}} <br></li>
                                        </ul>
                        
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1"><span data-feather="mail" class="feather-sm me-1"></span> {{$user->email}} <br></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-8 col-xl-9">
                                <div class="card">
                                    <div class="card-header">
    
                                        <h5 class="card-title mb-0">RB Files</h5>
                                        <small class="float-end align-items-end">
                                            <a href="{{route('rbfiles.create')}}" class="btn btn-sm btn-dark">Create</a>
                                        </small>
                                    </div>
                                    <div class="card-body h-100">
                                        <div class="d-flex align-items-start">
                                            @if (count($user->rb_files) === null)
                                            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Go to create and fill out the form. You will recieve an email with further information.">
                                                check out the steps to create a file on our platform
                                            </button>
                                                
                                            @else
                                            @foreach ($user->rb_files as $rb)
                                            <a href="{{route('rbfiles.show', $rb->id)}}">
                                                <img src="{{asset('img/icons/file.jpg')}}" width="36" height="36" class="" alt="File">
                                            </a>
                                            <div class="flex-grow-1">
                                                <small class="float-end text-navy">
                                                    <a class="badge bg-secondary text-white ms-2" href="#">
                                                        @if ($rb->status->file_opened === 1 && $rb->status->file_opened === 0)
                                                            opened
                                                        @else
                                                            closed
                                                        @endif
                                                    {{-- {{$rb->status->file_opened}} --}}
                                                    </a>
                                                </small>
                                                <strong> File</strong> number <strong>{{$rb->ref}}</strong><strong> Import</strong><br />
                                                <small class="text-muted">{{$rb->created_at}}</small><br />
    
                                            </div>
                                        </div>
    
                                        <hr />
                                            @endforeach
                                            @endif
                                            
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Load more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </main>
    
		</div>
	</div>

    @include('layouts.scripts')
    @include('layouts.home-modal') 
</body>

</html>