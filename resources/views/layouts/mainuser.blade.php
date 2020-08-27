<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta http-equiv = "X-UA-Compatible" content = "ie = edge">--}}

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Sarabun">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bgimg.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/form.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css')}}">
    {{--    <link rel="stylesheet" href="{{ asset('/css/card.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('/css/card2.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.js"></script>
    <script src="{{ asset('js/dz.js') }}" defer></script>
    <script src="{{ asset('js/slideimg.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{--    <script src="sweetalert2.all.min.js"></script>--}}
    {{--    <link rel="stylesheet" href="sweetalert2.min.css">--}}
</head>
<body>
<div id="app">

    <div class="main_content" style="
        min-height: 100vh;">
        <div class="row" style="height: 61px">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="opacity: 0.9;">
                <p class="textlogo" style="text-align: center">
                    FAT CAT
                </p>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

{{--                            <form method="GET" action="{{ url('welcome') }}" accept-charset="UTF-8"--}}
{{--                                  class="form-inline my-2 my-lg-0 float-right" role="search" style="margin-right: 400px">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" name="search" placeholder="Search..."--}}
{{--                                           value="{{ request('search') }}">--}}
{{--                                    <span class="input-group-append">--}}
{{--                                    <button class="btn btn-outline-secondary" type="submit">--}}
{{--                                        <i class="fa fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                            <li class="nav-item dropdown">
                                {{--                                <img src="{{url('/user-demo.png')}}" style="width: 40px;height: 40px;border-radius: 30px">--}}
                                <img src="{{auth()->user()->image}}" style="width: 40px;height: 40px;border-radius: 20px">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="display: inline">
                                    {{ auth()->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    {{--                                    <ul class="dropdown-menu" aria-labelledby="dropdownLang">--}}
                                    <a class="dropdown-item" href="{{ url('/editprofile/'.auth()->user()->id) }}"><i class="fas fa-user" aria-hidden="true"></i>&nbsp; Profile</a>
                                    <a class="dropdown-item" href="{{ URL::to('lang/en') }}"><img src="../en-flag.png" style="width: 13px;height: 13px">&nbsp; English</a>
                                    <a class="dropdown-item" href="{{ URL::to('lang/th') }}"><img src="../th-flag.png" style="width: 13px;height: 13px">&nbsp; Thailand</a>
                                    {{--                                    </ul>--}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                {{--            </div>--}}
            </nav>
        </div>
        <div class="row d-flex justify-content-center">

            @yield('sidebar')
            @yield('content')
        </div>
    </div>
</div>
</body>

</html>
