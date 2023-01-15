<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
<i class="hamburger align-self-center"></i>
</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            
            <li>
                <a class="btn btn-dark btn-sm" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
           
            <li class="nav-item ">   
                <img src="{{asset('img/avatars/avatar.png')}}" class="avatar img-fluid rounded me-1" alt="Person" />
                <span class="text-dark">
                    {{-- @if ($user !== null)
                       {{$user->name}} 
                    @endif --}}
                </span>
            </li>
        </ul>
    </div>
</nav>