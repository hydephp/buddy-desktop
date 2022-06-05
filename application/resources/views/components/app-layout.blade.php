<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />

        <link href="{{ asset('app.css') }}" rel="stylesheet" />

        @livewireStyles
    </head>
    <body class="g-sidenav-show bg-gray-100">
        @if(session()->has('errorBanner'))
            <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                <strong class="text-white alert-text ms-2">
                    {{ session()->get('errorBanner') }}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <livewire:sidebar />

        <main style="width: calc(100vw - 400px); margin-left: 300px;">
            {{ $slot }}
        </main>

        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

        <!-- Control Center for Argon Dashboard: parallax effects, scripts for the example pages etc -->
        {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script> --}}

        @livewireScripts
    </body>
</html>

<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->