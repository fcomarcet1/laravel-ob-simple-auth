<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <h1>Home Page</h1>
    {{--<h2>Welcome {{)}}</h2>--}}
     {{-- Create login, register  a href--}}
    @if(Session::has('user'))
        {{--<a href="{{ route('logout') }}">Logout</a>--}}
        <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();">Logout</a>
        <form method="post" action="{{ route('logout') }}" id="logout" style="display: none">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endif

</body>
</html>
