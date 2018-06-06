<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>{{ trans('auth.lost-password') }} - {{ config('other.title') }}</title>
    @section('meta')
        <meta name="description"
              content="{{ trans('auth.login-now-on') }} {{ config('other.title') }} . {{ trans('auth.not-a-member') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="{{ config('other.title') }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ url('/img/rlm.png') }}">
        <meta property="og:url" content="{{ url('/') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('css/main/login.css?v=02') }}">
</head>

<body>
<div class="wrapper fadeInDown">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <svg viewBox="0 0 1320 100">
        <symbol id="s-text">
            <text text-anchor="middle"
                  x="50%" y="50%" dy=".35em">
                {{ config('other.title') }}
            </text>
        </symbol>
        <use xlink:href="#s-text" class="text"
        ></use>
        <use xlink:href="#s-text" class="text"
        ></use>
        <use xlink:href="#s-text" class="text"
        ></use>
        <use xlink:href="#s-text" class="text"
        ></use>
        <use xlink:href="#s-text" class="text"
        ></use>
    </svg>

    <div id="formContent">
        <a href="{{ route('login') }}"><h2 class="inactive underlineHover">{{ trans('auth.login') }} </h2></a>
        <a href="{{ route('registrationForm', ['code' => $code]) }}"><h2 class="inactive underlineHover">{{ trans('auth.login') }} </h2></a>

        <div class="fadeIn first">
            <img src="{{ url('/img/icon.svg') }}" id="icon" alt="{{ trans('auth.user-icon') }}"/>
        </div>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="form-group">
                    <input type="email" id="email" class="fadeIn third" name="email"
                           placeholder="{{ trans('common.email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="{{ trans('common.password') }}" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('common.password') }} confirmation" required>
                </div>
                <div class="col s6">
                    <button type="submit"
                            class="btn waves-effect waves-light blue right">{{ trans('common.submit') }}</button>
                </div>
            </div>
        </form>

        <div id="formFooter">
            <a href="{{ route('password.request') }}"><h2 class="active">{{ trans('auth.lost-password') }} </h2></a>
            <a href="{{ route('username.request') }}"><h2 class="inactive underlineHover">{{ trans('auth.lost-username') }} </h2></a>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('js/app.js') }}"></script>
{!! Toastr::message() !!}

</body>
</html>
