```blade
@extends('master')

@section('content')

<style>
    .ishop-register-page {
        min-height: 85vh;
        padding: 50px 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at top left, rgba(91, 0, 168, .09), transparent 35%),
            linear-gradient(135deg, #f8f9fc, #f7f1ff);
    }

    .ishop-register-page * {
        box-sizing: border-box;
    }

    .ishop-register-card {
        width: 100%;
        max-width: 520px;
        margin: 0 auto;
        padding: 35px 38px;
        background: #fff;
        border: 1px solid #eee7f5;
        border-radius: 18px;
        box-shadow: 0 15px 45px rgba(43, 20, 65, .09);
    }

    .ishop-register-logo {
        text-align: center;
        margin-bottom: 22px;
    }

    .ishop-register-logo img {
        max-width: 150px;
        max-height: 55px;
        object-fit: contain;
    }

    .ishop-register-heading {
        text-align: center;
        font-size: 27px;
        font-weight: 750;
        color: #252033;
        margin: 0 0 8px;
    }

    .ishop-register-subtitle {
        text-align: center;
        color: #858091;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .ishop-register-page .form-label {
        display: block;
        font-size: 13px;
        font-weight: 650;
        color: #393246;
        margin-bottom: 8px;
    }

    .ishop-register-field {
        margin-bottom: 19px;
    }

    .ishop-register-field .form-control {
        width: 100%;
        height: 48px;
        padding: 11px 13px;
        border: 1px solid #e2dce9;
        border-radius: 9px;
        background: #fff;
        color: #292333;
        font-size: 14px;
        box-shadow: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .ishop-register-field .form-control:focus {
        border-color: #5b00a8;
        box-shadow: 0 0 0 3px rgba(91, 0, 168, .09);
    }

    .ishop-register-field .form-control.is-invalid {
        border-color: #dc3545;
    }

    .ishop-register-field .invalid-feedback {
        display: block;
        font-size: 12px;
        margin-top: 6px;
    }

    .ishop-register-password {
        position: relative;
    }

    .ishop-register-password .form-control {
        padding-right: 48px;
    }

    .ishop-register-toggle {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #81758f;
        padding: 5px;
        cursor: pointer;
        line-height: 1;
    }

    .ishop-register-toggle:hover {
        color: #5b00a8;
    }

    .ishop-register-submit {
        width: 100%;
        min-height: 49px;
        border: 0;
        border-radius: 9px;
        background: #5b00a8;
        color: #fff;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .2s;
    }

    .ishop-register-submit:hover {
        background: #43007d;
        transform: translateY(-1px);
    }

    .ishop-register-login {
        text-align: center;
        margin-top: 23px;
        color: #777184;
        font-size: 13px;
    }

    .ishop-register-page a {
        color: #5b00a8;
        text-decoration: none;
    }

    .ishop-register-page a:hover {
        color: #43007d;
        text-decoration: underline;
    }

    .ishop-register-login a {
        font-weight: 700;
        margin-left: 4px;
    }

    .ishop-register-divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 24px 0;
        color: #a19aaa;
        font-size: 11px;
    }

    .ishop-register-divider::before,
    .ishop-register-divider::after {
        content: "";
        height: 1px;
        flex: 1;
        background: #eee9f2;
    }

    .ishop-register-terms {
        text-align: center;
        color: #96909f;
        font-size: 12px;
        line-height: 1.8;
        margin: 0;
    }

    .ishop-register-footer {
        text-align: center;
        color: #96909f;
        font-size: 12px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #f0ecf4;
    }

    @media (max-width: 575px) {
        .ishop-register-page {
            min-height: auto;
            padding: 28px 12px;
        }

        .ishop-register-card {
            padding: 27px 20px;
            border-radius: 14px;
        }

        .ishop-register-heading {
            font-size: 24px;
        }
    }
</style>

<div class="ishop-register-page">
    <div class="container">

        <div class="ishop-register-card">

            {{-- Logo --}}
            <div class="ishop-register-logo">
                <a href="{{ url('/') }}">
                    <img
                        src="{{ asset('images/logo.svg') }}"
                        alt="Ishop Logo"
                    >
                </a>
            </div>

            <h2 class="ishop-register-heading">Create Your Account</h2>

            <p class="ishop-register-subtitle">
                Join Ishop and enjoy a better shopping experience.
            </p>

            {{-- Success Message --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Registration Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="ishop-register-field">
                    <label for="name" class="form-label">
                        Full Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                        autocomplete="name"
                        autofocus
                    >

                    @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Phone Number --}}
                <div class="ishop-register-field">
                    <label for="phone" class="form-label">
                        Phone Number
                    </label>

                    <input
                        id="phone"
                        type="tel"
                        class="form-control @error('phone') is-invalid @enderror"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Enter your phone number"
                        required
                        autocomplete="tel"
                    >

                    @error('phone')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="ishop-register-field">
                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email address"
                        required
                        autocomplete="email"
                    >

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="ishop-register-field">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="ishop-register-password">
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="ishop-register-toggle"
                            data-password-target="password"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            <svg width="19" height="19"
                                viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="ishop-register-field">
                    <label for="password-confirm" class="form-label">
                        Confirm Password
                    </label>

                    <div class="ishop-register-password">
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder="Re-enter your password"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="ishop-register-toggle"
                            data-password-target="password-confirm"
                            aria-label="Show confirm password"
                            aria-pressed="false"
                        >
                            <svg width="19" height="19"
                                viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit" class="ishop-register-submit">
                    Create Account
                </button>

            </form>

            {{-- Login Link --}}
            <div class="ishop-register-login">
                Already have an account?
                <a href="{{ url('/login') }}">Sign In</a>
            </div>

            <div class="ishop-register-divider">
                SHOP WITH CONFIDENCE
            </div>

            <p class="ishop-register-terms">
                By creating an account, you agree to our
                <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
            </p>

            <div class="ishop-register-footer">
                © {{ date('Y') }} Ishop. All rights reserved.
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ishop-register-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const targetId = button.getAttribute('data-password-target');
                const passwordInput = document.getElementById(targetId);

                if (!passwordInput) {
                    return;
                }

                const showPassword = passwordInput.type === 'password';

                passwordInput.type = showPassword ? 'text' : 'password';

                button.setAttribute('aria-pressed', String(showPassword));
                button.setAttribute(
                    'aria-label',
                    showPassword ? 'Hide password' : 'Show password'
                );
            });
        });
    });
</script>

@endsection
```