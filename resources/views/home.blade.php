<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Css bootstrap cdn--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Css custom--}}
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <h1>Home Page</h1>
    <p>This is the homepage of {{ env('APP_NAME') }}</p>
    {{-- show flash message --}}
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{--<p style="color: red">{{ session('error') }}</p>--}}
            <p style="color: red">{{ Session::get('error') }}</p>
        </div>
    @endif
    {{--<h2>Welcome {{)}}</h2>--}}
     {{-- Create login, register  a href--}}
    @if(Session::has('user'))
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles</a>
        <a href="{{ route('types.index') }}" class="btn btn-success">Types</a>
        <a href="javascript:void(0)" class="btn btn-danger" onclick="document.getElementById('logout').submit();">Logout</a>
        <form method="post" action="{{ route('logout') }}" id="logout" style="display: none">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endif

</body>
</html>
