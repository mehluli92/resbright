{{-- @if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</div>
@endif --}}
<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome to, Resbright Investments Service portal</h1>
							<p class="lead">
								Sign up to create your account.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									
									<form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>

                                        <div class="mb-3">
											<label class="form-label">Surname</label>
											<input class="form-control form-control-lg @error('surname') is-invalid @enderror" type="text" name="surname" placeholder="Enter your name" />
                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>

                                        <div class="mb-3">
											<label class="form-label">Mobile number</label>
											<input class="form-control form-control-lg @error('mobile') is-invalid @enderror" type="text" name="mobile" placeholder="+263xxxxxxxxxx" />
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>

										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>

										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required autocomplete="new-password"/>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>

                                        <div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg @error('password-confirm') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm-password" required autocomplete="new-password" />
                                            @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										</div>
                                        <input type="hidden" id="role" name="role" value="3">

                                        <a href="{{ route('welcome') }}">Login to existing account.</a>

										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">
                                                Sign in
                                            </button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>