<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
    @include('layouts.head')
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="https://kb-sla.wika.co.id/uploads/images/system/2024-01/logo-it-div-stroke-putih-tipis.png"
                        width="110" height="32" alt="Helpdesk" class="navbar-brand-image">
                    <h2 class="page-title">HELPDESK IT</h2>
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    @if (session()->get('failed'))
                        {{ session()->get('failed') }}
                    @endif
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="/login" method="post" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com"
                                autocomplete="off" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="./forgot-password.html">I forgot password</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" id="password"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    placeholder="Your password" autocomplete="off" name="password">
                                <span class="input-group-text">
                                    <a href="#" onclick="showPW()" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="/registrasi" tabindex="-1">Sign
                    up</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    {{-- <script src="./dist/js/tabler.min.js?1692870487" defer></script>
    <script src="./dist/js/demo.min.js?1692870487" defer></script> --}}
    @include('layouts.foot');
    <script>
        var passwordField = document.querySelector("#password")

        function showPW() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>
