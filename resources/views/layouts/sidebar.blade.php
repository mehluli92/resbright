<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('home')}}">
  <span class="align-middle">Resbright Portal</span>
</a> 
<!--{{$user}}-->
        @if ($user->role == 1)
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{route('dashboard')}}">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Admin Dashboard</span>
                </a>
            </li>
        @endif

        @if ($user->role == 2)
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{route('dashboard')}}">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Admin Dashboard</span>
                </a>
            </li>
        @endif
        

        <ul class="sidebar-nav">
            <li class="sidebar-header">
               Users.
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('home')}}">
            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
            </li>

            @if ($user->role == 3)
                
            @else
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('users.index')}}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">All Users</span>
                    </a>
                </li>
            @endif
                
            @if ($user->role == 3)
                
            @else
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('roles.index')}}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Role Management</span>
                    </a>
                </li>
            @endif
        
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
      <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Update Profile</span>
    </a>
            </li>
 <!-- Customs clearence start-->
          @if($user->role == 3)
            


           
          @else
                <li class="sidebar-header">
                    Customs Clearence
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('rbfiles.all')}}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">RB Files</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="corner-right-down"></i> <span class="align-middle">Imports</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="corner-right-up"></i> <span class="align-middle">Exports</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Airway Bills</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Bill of Lading</span>
                    </a>
                </li>
          @endif
 <!-- Customs clearence end-->

            <li class="sidebar-header">
                Payments
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('rbfiles.unpaid')}}">
      <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Pending Payments.</span>
    </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('rbfiles.paid')}}">
      <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Paid Orders</span>
    </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
      <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Cost Estimation</span>
    </a>
            </li>
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Enquiries</strong>
                <div class="mb-3 text-sm">
                   Do you have any more enquiries? 
                </div>
                <div class="d-grid">
                    <a href="http://menokws.co.zw" class="btn btn-primary">Support</a>
                </div>
            </div>
        </div>
    </div>
</nav>