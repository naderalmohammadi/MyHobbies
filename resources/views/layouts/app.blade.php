<!doctype html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description', 'This is a fun social website to share your hobbies')">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'My Hobbies')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href='/'>
                    {{ config('app.name', 'myapp') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li><a class="nav-link{{Request::is('home') ? ' active' : ''}}" href='/home'>{{trans('main.Home')}}</a></li>
                        @endauth
                        @guest
                            <li><a class="nav-link{{Request::is('/') ? ' active' : ''}}" href='/'>{{trans('main.Home')}}</a></li>
                        @endguest
                        <li><a class="nav-link{{Request::is('info') ? ' active' : ''}}" href='/info'>{{trans('main.Info')}}</a></li>
                        <li><a class="nav-link{{Request::is('hobby*') ? ' active' : ''}}" href='/hobby'>{{trans('main.Hobbies')}}</a></li>
                        <li><a class="nav-link{{Request::is('tag*') ? ' active' : ''}}" href='/tag'>{{trans('main.Tags')}}</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item lang">
                        <a id={{ app()->getLocale() == 'en' ? "lang" : "_" }} class="nav-link"
                                    href="{{app()->getLocale() == 'en' ? '/lang/ar' : '/lang/en'}}"
                                    >{{ app()->getLocale() == 'en' ? 'العربية' : 'English' }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href='/login'>{{ trans('main.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href='/register'>{{ trans('main.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @isset($message_success)
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! $message_success !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            </div>
            @endisset

            @isset($message_warning)
            <div class="container">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {!! $message_warning !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            </div>
            @endisset


            {{-- @if($errors->any())
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif --}}
            @yield('content')
        </main>
    </div>
</body>
</html>
