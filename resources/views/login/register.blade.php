@extends('layout.login')

@section('konten')
<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <form method="post">
                        @csrf
                        <div class="card-body">
                            {{-- <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4"> --}}
                            <h4 class="mb-3 f-w-400">Register</h4>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="Username" name="username" placeholder="" value="{{ old('username') }}" >
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" class="form-control" id="Email" name="email" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password" placeholder="">
                            </div>

                            <button class="btn btn-primary btn-block mb-4">Sign up</button>
                            <p class="mb-2">Already have an account? <a href="/login" class="f-w-400">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->
@endsection