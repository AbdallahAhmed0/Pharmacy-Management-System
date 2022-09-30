<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body {
        background-color: #f8f9fa;
        color: #333;
        font-family: 'Mada', sans-serif;
        font-size: 1rem;
        height: 100%;
        line-height: 1.5;
        overflow-x: hidden;
    }

    button:hover {
        font-weight: 700;
    }

    .loginbox {
        background-color: #fff;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        margin: 1.875rem auto;
        max-width: 800px;
        min-height: 500px;
        width: 100%;
    }

    .login-left {
        align-items: center;
        background: linear-gradient(180deg, #1b5a90, #00d0f1);
        border-radius: 6px 0 0 6px;
        flex-direction: column;
        justify-content: center;
        padding: 80px;
        width: 400px;
        display: flex;
    }

    .login-right {
        align-items: center;
        display: flex;
        justify-content: center;
        padding: 40px;
        width: 400px;
    }


    .login-wrapper {
        width: 100%;
        height: 100%;
        display: table-cell;
        vertical-align: middle;
    }

    .login-body {
        display: table;
        height: 100vh;
        min-height: 100vh;
    }

    .main-wrapper {
        width: 100%;
        height: 100vh;
        min-height: 100vh;
    }
</style>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">

                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
                </div>


                <div class="login-right">

                    <x-guest-layout>
                        <div>

                            <div class="text-center mb-4 mt-4">
                                <h1 style="font-size: 33px; font-weight: 700">Login</h1>
                                <p class="account-subtitle" style="font-size: 22px;">Access to the dashboard</p>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                        {{-- @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror --}}
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="current-password" />
                                        {{-- @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror --}}
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="remember" style="color: #00d0f1">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="mt-4">

                                    <div class="row mb-2">
                                        <button class="col-11 pt-2 pb-2"
                                            style="color: white; background-color: #00d0f1; border: solid 2px white; border-radius: 7px;
                                            margin-left: 10px;
                                             font-size: 15px; text-align: center">
                                            {{ __('Log in') }}
                                        </button>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="underline text-md text-gray-600 hover:text-gray-900"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </x-guest-layout>

                </div>
            </div>
        </div>
    </div>
</div>
