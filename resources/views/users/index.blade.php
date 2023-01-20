<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
	<div class="wrapper">
	
        @include('layouts.sidebar')
    <div class="main">

        @include('layouts.nav')
                <main class="content">
                    <!--search begin-->
                    <form action="{{ route('users.search') }}" method="GET">
                       
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <input class="form-control"  type="text" name="mobile" placeholder="+263xxxxxxxxx" required/>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">Search</button>

                                </div>
                            </div>
                        </div> <br>
                    </form>
                    <!--search end-->
                   <div class="container">
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="card flex-fill">
                            <div class="card-header">
                               
                                <h5 class="card-title mb-0">System Users</h5>
                                <div class="text-right float-right">
                                    <a class="btn btn-dark" href="{{route('users.create')}}">Add User</a>
                                </div>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th class="d-none d-xl-table-cell">Name</th>
                                        <th class="d-none d-xl-table-cell">Surname</th>
                                        <th class="d-none d-xl-table-cell">Role</th>
                                        <th class="d-none d-md-table-cell">Email</th>
                                        <th class="d-none d-md-table-cell">Mobile</th>
                                        <th class="d-none d-md-table-cell">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td class="d-none d-xl-table-cell">{{$user->name}}</td>
                                        <td class="d-none d-xl-table-cell">{{$user->surname}}</td>
                                        <td class="d-none d-xl-table-cell">{{$user->role}}</td>
                                        <td><span class="badge bg-success">{{$user->email}}</span></td>
                                        <td class="d-none d-md-table-cell">{{$user->mobile}}</td>
                                        <td class="d-none d-md-table-cell">
                                            <a  href="{{route('users.show', $user->id)}}">
                                                <i class="align-middle" data-feather="search"></i> 
                                            </a>
                                            <a  href="{{route('home.user', $user->id)}}" class="btn btn-sm btn-secondary">
                                                All Files 
                                            </a>
                                            <a class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#addFile" href="">
                                                Add File
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                      

                                                  
                                </tbody>
                            </table> <br>
                            {!! $users->links() !!}
                        </div>
                    </div>
                   </div>

                     <!-- Modal -->
<div class="modal fade" id="addFile" tabindex="-1" aria-labelledby="addFile" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addFile">Create File</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('rbfiles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <h3>Item Details.</h3>
                  </div>
                  <input type="hidden" id="user" name="user" value={{$user->id}}>

                  <div class="">
                    <label class="form-label">Individual or Company name</label>
                    <input class="form-control form-control-lg" type="text" name="importer" placeholder="Jon Doe or Amazon" />
                </div> 

                <label for="document">Select a file:</label>
                <input class="form-control" type="file" id="document" name="document">
                 
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Add</button>
        </div>
            </form>
        </div>
      </div>
    </div>
  </div>
                </main>
    
		</div>
	</div>

    @include('layouts.scripts')
</body>

</html>