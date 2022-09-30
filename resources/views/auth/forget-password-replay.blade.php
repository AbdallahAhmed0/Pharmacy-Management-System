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
                            <div class="text-center mb-5 mt-3">
                                <h1 class="mb-1" style="font-size: 33px; font-weight: 700">Password Reset?</h1>
                                <p class="account-subtitle" style="font-size: 20px;">Check your email inbox for password
                                    reset.</p>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div class="mt-4">
                                <div class="row mb-2">
                                    <a href="{{ route('login') }}">
                                        <button class="col-8 pt-2 pb-2"
                                        style="color: white; background-color: #00d0f1; border: solid 2px white; border-radius: 7px;
                                            margin-left: 100px;
                                             font-size: 15px; text-align: center">
                                        {{ __('Back to Login') }}
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </x-guest-layout>

                </div>
            </div>
        </div>
    </div>
</div>
