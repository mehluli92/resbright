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
            <form action="{{ route('rbfiles.search') }}" method="GET">
                       
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control"  type="text" name="ref" placeholder="RB1" required/>
                        </div>
                        <!--<div class="col-3">-->
                        <!--    <input class="form-control"  type="text" name="supplier" placeholder="supplier" required/>-->
                        <!--</div>-->
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Search</button>

                        </div>
                    </div>
                </div> <br>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                <div class="card ">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Show all Rb Files</h5>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th class="d-none d-xl-table-cell">Date</th>
                                        <th class="d-none d-xl-table-cell">Ref.</th>
                                        <th class="d-none d-xl-table-cell">Import</th>
                                        <th class="d-none d-xl-table-cell">Supplier</th>
                                        <th class="d-none d-md-table-cell">Paid</th>
                                        <th class="d-none d-md-table-cell">Status</th>
                                        <th class="d-none d-md-table-cell">Description</th>
                                        <th class="d-none d-md-table-cell">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rbs as $rb)
                                    <tr>
                                        <td>{{$rb->id}}</td>
                                        <td class="d-none d-xl-table-cell">{{$rb->created_at}}</td>
                                        <td class="d-none d-xl-table-cell">{{$rb->ref}}</td>
                                        <td  ><span class="badge bg-secondary">{{$rb->import}}</span></td>
                                        <td class="d-none d-xl-table-cell">{{$rb->supplier}}</td>
                                        <td><span class="badge bg-success">{{$rb->payed}}</span></td>
                                        <td><span class="badge bg-success">{{$rb->status->file_opened}}</span></td>
                                        <td class="d-none d-lg-table-cell">{{$rb->description}}</td>
                                        <td class="d-none d-md-table-cell">
                                            <a  href="{{route('rbfiles.show', $rb->id)}}">
                                                <i class="align-middle" data-feather="search"></i> 
                                            </a>
                                            <a href="{{route('rbfiles.edit', $rb->id)}}" class="btn btn-info btn-sm">
                                                Respond
                                            </a>
                                           
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                {!! $rbs->links() !!}

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