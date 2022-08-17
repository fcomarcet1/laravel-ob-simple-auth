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
<form action="" method="post" autocomplete="off">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Add name"><br/>
    <input type="submit" value="Add User">
</form>
</body>
</html>
