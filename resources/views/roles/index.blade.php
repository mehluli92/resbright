<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
	<div class="wrapper">
	
        @include('layouts.sidebar')
    
    <div class="main">
        @include('layouts.nav')
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div>
                    @endif
                  </div>
            </div>
            <div class="row">
                <div class="col-2 col-md-2 col-xs-1 col-sm-1"></div>
                
                <div class="col-8 col-md-8">
                    <br>
                    <h2>System Roles</h2> <a href="{{route('roles.create')}}" class="btn btn-sm btn-secondary">Create Roles</a>
                    <br>
                    @foreach ($roles as $role)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{$role->id}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">name:
                                <a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a>
                            </p>
                            <p class="card-text">Description: {{$role->description}}</p>
                            <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        
	</div>

    @include('layouts.scripts')
</body>

</html>