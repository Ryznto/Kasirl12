@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            transition: background-color 0.4s, color 0.4s;
        }

        .light-mode {
            background-color: #f4f4f4;
            color: #333;
        }

        .dark-mode {
            background-color: #181824;
            color: #eee;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-box {
            background-color: #232336;
            padding: 2rem;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.7s ease-in-out;
        }

        .light-mode .login-box {
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-logo {
            width: 50px;
            height: 50px;
            margin: 0 auto 15px;
            display: block;
        }

        .login-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .login-subtext {
            font-size: 0.9rem;
            color: #aaa;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .light-mode .login-subtext {
            color: #666;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-control {
            background-color: #2f2f47;
            border: none;
            border-radius: 6px;
            color: #fff;
            padding: 10px;
        }

        .form-control:focus {
            background-color: #2f2f47;
            border: 1px solid #6c63ff;
            box-shadow: none;
        }

        .light-mode .form-control {
            background-color: #f4f4f4;
            color: #000;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #6c63ff;
            border: none;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5751d6;
        }

        .form-check-label {
            font-size: 0.85rem;
        }

        .btn-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .invalid-feedback strong {
            color: #ff5e5e;
            font-size: 0.85rem;
        }

        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            border: none;
            color: inherit;
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>

    <div id="themeRoot" class="dark-mode">
        <button class="theme-toggle" onclick="toggleTheme()">🌓</button>

        <div class="login-wrapper">
            <div class="login-box">
                {{-- Logo / Icon --}}
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="login-logo" alt="User Icon">

                <div class="login-title">Login</div>
              

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
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
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
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

                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const root = document.getElementById('themeRoot');
            root.classList.toggle('dark-mode');
            root.classList.toggle('light-mode');
        }
    </script>
@endsection
