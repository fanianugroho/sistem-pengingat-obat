@extends('auth.auth_template')

@section('title')
Sign up
@endsection

@section('main')


<div class="wrap-login100">
    <form class="login100-form-regis validate-form" action="{{ route('register') }}" method="POST">
        <img class="login-apotech" src="{{url('/')}}/template/assets/images/login/apotech2.png" />
        @csrf
        <span class="login100-form-title p-b-43">
            <h2 class="apotech-masuk"> <b> Register</b> </h2>
        </span>


        <div class="wrap-input100 validate-input">

            <input class="input100" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                name="nama" value="{{ old('nama') }}" placeholder="Nama">
            @error('nama')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input">
            <input class="input100" id="username" type="text"
                class="form-control @error('username') is-invalid @enderror" name="username"
                value="{{ old('username') }}" placeholder="Username">
            @error('username')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <select type="text" id="tipe_user" class="form-control @error('tipe_user') is-invalid @enderror"
                name="tipe_user" value="{{ old('tipe_user') }}" placeholder="Tipe User">
                <option value="admin">Admin</option>
                <option value="apoteker">Apoteker</option>
            </select>
            @error('tipe_user')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <input class="input100" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password">
            @error('password')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="wrap-input100 validate-input">
            <input class="input100" id="password-confirm" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Konfirmasi Password">
        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
            {{ __('Register') }}
            </button>
        </div>
    </form>

    <div class="login100-more" style="background-image: url('template_login/images/login.png');">
    </div>

</div>
@endsection
