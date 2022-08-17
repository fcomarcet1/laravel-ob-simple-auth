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
<h1>Login page</h1>
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{--<p style="color: red">{{ session('error') }}</p>--}}
        <p style="color: red">{{ Session::get('error') }}</p>
    </div>
@endif
<form action="{{ route('login') }}" method="post" autocomplete="off">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email"><br/>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password"><br/>
    <input type="submit" value="Login">
</form>
</body>
</html>
