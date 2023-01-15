<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
<!--external bootstrap 5.2-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!--external bootstrap 5.2-->

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('img/icons/resbright.jpg')}}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Resbright Investments</title>

	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

 {{-- <!-- Authentication Links -->
 @guest
 <li class="nav-item">
	 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
 </li>
 @if (Route::has('register'))
	 <li class="nav-item">
		 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	 </li>
 @endif
@else
 <li class="nav-item dropdown">
	 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		 {{ Auth::user()->name }}
	 </a>

	 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		 <a class="dropdown-item" href="{{ route('logout') }}"
			onclick="event.preventDefault();
						  document.getElementById('logout-form').submit();">
			 {{ __('Logout') }}
		 </a>

		 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
			 @csrf
		 </form>
	 </div>
 </li>
@endguest --}}