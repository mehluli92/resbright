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
            <h2>Add new role.</h2>
            <a href="{{route('roles.index')}}" class="btn btn-sm btn-secondary">View all roles.</a>
            <div class="card-body">
                <div class="m-sm-4">
                    <form method="post" action="{{ route('roles.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Role name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control form-control-lg" type="text" name="description" placeholder="Enter your role description" />
                        </div>
                       
                        <div class="text-center mt-3">
                             <button type="submit" class="btn btn-lg btn-primary">Add Role</button>
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