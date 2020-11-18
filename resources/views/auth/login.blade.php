@extends('auth.auth_template')

@section('title')
Sign in
@endsection

@section('main')

<div class="col-lg-12 col-md-7 bg-white">
    <div class="p-3">
        <div class="text-center">
            <img src="{{asset('template/assets/images/login/apotech.png')}}" alt="wrapkit">
        </div>
        <form class="mt-4" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus id="email" type="text"
                            placeholder="Masukkan Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="password">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" id="password" type="password"
                            placeholder="Masukkan Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Ingatkan saya') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-block btn-primary">{{ __('Masuk') }}</button>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
                <!-- <div class="col-lg-12 text-center mt-5">
                    Don't have an account? <a href="{{ route('register') }}" class="text-danger">Sign Up</a>
                </div> -->
            </div>
        </form>
    </div>
</div>
@endsection
