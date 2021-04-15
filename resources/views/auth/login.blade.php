@extends('auth.auth_template')

@section('title')
Sign in
@endsection

@section('main')

<div class="wrap-login100">
    <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
        <img class="login-apotech" src="{{url('/')}}/template/assets/images/login/apotech2.png" />
        @csrf
        <span class="login100-form-title p-b-43">
            <h2 class="apotech-masuk"> <b>Masuk sebagai <br /> Apoteker</b> </h2>
        </span>


        <div class="wrap-input100 validate-input">
            <input class="input100 @error('email') is-invalid @enderror" type="text" value="{{ old('email') }}" required
                autocomplete="email" id="email" name="email" placeholder="Email">
            @error('email')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input">
            <input class="input100 @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password" id="password" type="password" placeholder="Kata Sandi">
            @error('password')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{ __('Masuk') }}
            </button>
            <!-- <div class="col-lg-12 text-center mt-5">
                Belum punya akun ? <a href="{{ route('register') }}" class="text-danger">Register</a>
            </div> -->
        </div>
    </form>

    <div class="login100-more" style="background-image: url('template_login/images/login.png');">
    </div>

</div>
@endsection
