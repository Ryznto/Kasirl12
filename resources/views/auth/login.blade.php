@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(to right, #1c1f2b, #2e3a59);
            color: #f1f1f1;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
            background-color: #2d2f4a;
        }

        .login-card .card-header {
            background-color: transparent;
            border-bottom: none;
            font-size: 1.7rem;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
            padding-top: 25px;
        }

        .login-subtext {
            text-align: center;
            font-size: 0.95rem;
            color: #bbb;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        label {
            color: #d1d1d1;
        }

        .form-control {
            background-color: #3a3d5c;
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background-color: #3a3d5c;
            color: #fff;
            border-color: #6c63ff;
            box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #ccc;
        }

        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }

        .btn-primary:hover {
            background-color: #5751d6;
            border-color: #5751d6;
        }

        .btn-link {
            font-size: 0.9rem;
            color: #aaaaff;
        }

        .btn-link:hover {
            color: #fff;
        }

        .invalid-feedback strong {
            color: #ff6b6b;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6">
            <div class="card login-card">
                <div class="card-header">Welcome Back 👋</div>
                <p class="login-subtext">Silakan login untuk mengakses dashboard kasir</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
