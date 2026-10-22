@extends('master')

@section('content')

<style>
     .ishop-login-methods {
        display: flex;
        gap: 8px;
        margin-bottom: 22px;
        padding: 5px;
        background: #f4effa;
        border-radius: 10px;
    }

    .ishop-login-method {
        flex: 1;
        border: 0;
        border-radius: 7px;
        padding: 11px 8px;
        background: transparent;
        color: #655775;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .ishop-login-method.active {
        background: #5b00a8;
        color: #fff;
        box-shadow: 0 3px 8px rgba(91, 0, 168, .18);
    }

    .ishop-login-page {
        min-height: 85vh;
        padding: 55px 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at top left, rgba(220, 53, 69, .10), transparent 35%),
            linear-gradient(135deg, #f8f9fc, #fff5f5);
    }

    .ishop-login-page * {
        box-sizing: border-box;
    }

    .ishop-login-card {
        width: 100%;
        max-width: 460px;
        padding: 38px;
        background: #fff;
        border: 1px solid #edf0f4;
        border-radius: 18px;
        box-shadow: 0 15px 50px rgba(30, 35, 50, .09);
    }

    .ishop-login-logo {
        text-align: center;
        margin-bottom: 25px;
    }

    .ishop-login-logo img {
        max-width: 150px;
        max-height: 55px;
        object-fit: contain;
    }

    .ishop-login-heading {
        margin-bottom: 8px;
        text-align: center;
        color: #202431;
        font-size: 27px;
        font-weight: 750;
    }

    .ishop-login-subtitle {
        text-align: center;
        color: #858b98;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .ishop-login-page .form-label {
        display: block;
        color: #343946;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .ishop-input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .ishop-input-group .form-control {
        height: 49px;
        border: 1px solid #e0e4eb;
        border-radius: 9px;
        padding: 12px 14px;
        font-size: 14px;
        box-shadow: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .ishop-input-group .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, .10);
    }

    .ishop-input-group .form-control.is-invalid {
        border-color: #dc3545;
    }

    .ishop-input-group .invalid-feedback {
        display: block;
        font-size: 12px;
        margin-top: 6px;
    }

    .ishop-password-wrap {
        position: relative;
    }

    .ishop-password-wrap .form-control {
        padding-right: 48px;
    }

    .ishop-password-toggle {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #7b8190;
        cursor: pointer;
        padding: 4px;
    }

    .ishop-login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin: 2px 0 22px;
        font-size: 13px;
    }

    .ishop-login-page a {
        color: rgb(91, 0, 168);
        text-decoration: none;
    }

    .ishop-login-page a:hover {
        color: rgb(91, 0, 168);
        text-decoration: underline;
    }

    .ishop-login-submit {
        width: 100%;
        min-height: 49px;
        border: none;
        border-radius: 9px;
        background: rgb(91, 0, 168);
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        transition: background .2s, transform .2s;
    }

    .ishop-login-submit:hover {
        background: cryan;
        transform: translateY(-1px);
    }

    .ishop-login-divider {
        display: flex;
        align-items: center;
        gap: 14px;
        color: #9a9eaa;
        font-size: 12px;
        margin: 25px 0;
    }

    .ishop-login-divider::before,
    .ishop-login-divider::after {
        content: "";
        height: 1px;
        flex: 1;
        background: #e9ebf0;
    }

    .ishop-social-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        width: 100%;
        min-height: 45px;
        border: 1px solid #e0e4eb;
        border-radius: 9px;
        background: #fff;
        color: #343946;
        font-size: 13px;
        font-weight: 600;
        transition: background .2s, border-color .2s;
    }

    .ishop-social-btn:hover {
        background: #f8f9fb;
        border-color: #cfd4de;
    }

    .ishop-login-terms {
        text-align: center;
        color: #8a8f9b;
        font-size: 12px;
        line-height: 1.8;
        margin: 24px 0 0;
    }

    .ishop-login-footer {
        text-align: center;
        color: #8a8f9b;
        font-size: 12px;
        margin-top: 25px;
    }

    .ishop-create-account {
        text-align: center;
        margin-top: 23px;
        font-size: 13px;
        color: #727887;
    }

    @media (max-width: 575px) {
        .ishop-login-page {
            padding: 30px 12px;
            min-height: auto;
        }

        .ishop-login-card {
            padding: 27px 20px;
            border-radius: 14px;
        }

        .ishop-login-heading {
            font-size: 24px;
        }
    }
</style>

<div class="ishop-login-page">
    <div class="container">
        <div class="ishop-login-card mx-auto">

            <div class="ishop-login-logo">
                <a href="{{ url('/') }}">
                    <img
                        src="{{ asset('images/logo.svg') }}"
                        alt="Ishop Logo"
                    >
                </a>
            </div>

            <h2 class="ishop-login-heading">Welcome to Ishop</h2>
            <p class="ishop-login-subtitle">
                Sign in to continue shopping with us.
            </p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('email') && !$errors->has('password'))
                {{-- The email validation message is displayed below the email field. --}}
            @endif

           <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Login Method Tabs --}}
    <div class="ishop-login-methods">
        <button type="button"
                class="ishop-login-method active"
                data-method="email">
            Email Login
        </button>

        <button type="button"
                class="ishop-login-method"
                data-method="phone">
            Phone Login
        </button>
    </div>

    {{-- Email or Phone --}}
    <div class="ishop-input-group">
    <label for="login" class="form-label" id="loginLabel">
        Email Address
    </label>

    <input
        id="login"
        type="email"
        name="login"
        value="{{ old('login') }}"
        class="form-control @error('login') is-invalid @enderror"
        placeholder="Enter your email address"
        autocomplete="username"
        required
        autofocus
    >

    @error('login')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
    {{-- Password --}}
    <div class="ishop-input-group">
        <label for="password" class="form-label">Password</label>

        <div class="ishop-password-wrap">
            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password"
                autocomplete="current-password"
                required
            >

            <button type="button"
                    class="ishop-password-toggle"
                    id="ishopTogglePassword"
                    aria-label="Show password">
                Show
            </button>
        </div>

        @error('password')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="ishop-login-options">
        <label class="form-check">
            <input type="checkbox"
                   name="remember"
                   class="form-check-input"
                   {{ old('remember') ? 'checked' : '' }}>
            <span class="form-check-label">Remember me</span>
        </label>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                Forgot password?
            </a>
        @endif
    </div>

    <button type="submit" class="ishop-login-submit">
        {{ __('messages.Login') }}
    </button>
</form>
</div>
</div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const loginInput = document.getElementById('login');
    const loginLabel = document.getElementById('loginLabel');
    const methodButtons = document.querySelectorAll('.ishop-login-method');

    function setLoginMethod(method) {
        const isPhone = method === 'phone';

        loginLabel.textContent = isPhone ? 'Phone Number' : 'Email Address';
        loginInput.type = isPhone ? 'phone' : 'email';
        loginInput.placeholder = isPhone
            ? 'Enter your registered phone number'
            : 'Enter your email address';

        methodButtons.forEach(function (button) {
            const active = button.dataset.method === method;
            button.classList.toggle('active', active);
            button.setAttribute('aria-pressed', String(active));
        });
    }

    methodButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            setLoginMethod(button.dataset.method);
            loginInput.focus();
        });
    });

    // Password show/hide
    const toggle = document.getElementById('ishopTogglePassword');
    const password = document.getElementById('password');

    if (toggle && password) {
        toggle.addEventListener('click', function () {
            const show = password.type === 'password';
            password.type = show ? 'text' : 'password';
            toggle.textContent = show ? 'Hide' : 'Show';
            toggle.setAttribute('aria-label',
                show ? 'Hide password' : 'Show password');
        });
    }
});
</script>

@endsection