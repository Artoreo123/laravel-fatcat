<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta http-equiv = "X-UA-Compatible" content = "ie = edge">--}}

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


</head>
<body>
<div class="container">
    <ul class="nav navbar-nav">
        <li><a href="#">{{ trans('message.service') }}</a></li>
        <li><a href="#">{{ trans('message.portfolio') }}</a></li>
        <li><a href="#">{{ trans('message.about') }}</a></li>
        <li><a href="#">{{ trans('message.team') }}</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" id="dropdownLang" data-toggle="dropdown">
                {{ Config::get('app.locale') }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownLang">
                <li><a href="{{ URL::to('change/en') }}">ENGLISH</a></li>
                <li><a href="{{ URL::to('change/th') }}">THAILAND</a></li>
                <li><a href="{{ URL::to('change/jp') }}">JAPANESE</a></li>
                <li><a href="{{ URL::to('change/ch') }}">CHINESE</a></li>
            </ul>
        </li>
    </ul>
    <div class="row">
        <div class="intro-lead-in">{{ trans('message.welcome') }}</div>
        <div class="intro-heading">{{ trans('message.body') }}</div>
    </div>
</div>
</body>
</html>

