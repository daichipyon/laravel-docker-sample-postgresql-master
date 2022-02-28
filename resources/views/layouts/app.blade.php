<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-center">
            @auth
                <table class="nav nav-pills py-2">
                <tbody>
                    <td class="nav-item">
                        <a href="/home" class="nav-link">ホーム</a>
                    </td>

                    <td class="nav-item">
                            <a class="align-bottom" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </td>

                    <td class="nav-item">
                        <a href="{{route('post.new')}}" class="nav-link">投稿</a>
                    </td>
                </tbody>
                </table>
            @endauth

            @guest
            <table class="nav nav-pills py-2">
                <tbody>
                    <td class="nav-item">
                        <a href="/home" class="nav-link">ホーム</a>
                    </td>

                    <td class="nav-item">
                        <a href="/login" class="nav-link">ログイン</a>
                    </td>

                    <td class="nav-item">
                        <a href="/login" class="nav-link">投稿</a>
                    </td>
                </tbody>
                </table>

            @endguest
        </header>
    </div>
        @yield('content')
    </div>
</body>
</html>
