@extends('layout.login')

@section('konten')
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- <img onclick="admin()" src="assets/sibanter_biru_l.png" alt="" class="img-fluid mb-4"> -->
                        <h4 class="mb-3 f-w-400">Login</h4>
                        <form id="loginwoi">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">User</label>
                                <input type="text" name="email" class="form-control" id="Email" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="hidden" readonly name="sebagai" value="warga">
                                <input type="password" name="password" class="form-control" id="Password"
                                    placeholder="">
                            </div>
                            <!-- <div class="g-recaptcha" data-sitekey="6LfdZzEcAAAAAGLm8v6x3tzbzoxOkpEwEPbp46Xz"></div> -->
                            <br>
                            <button type="submit" class="btn btn-block btn-primary mb-4">Login</button>
                            {{-- <button type="submit">Login</button> --}}
                            {{-- <p class="mb-0 text-muted">Don’t have an account? <a href="/register" class="f-w-400">Register</a></p> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->
@endsection
