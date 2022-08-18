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
@if($id != null)
    <h2>Edit Role</h2>
@else
    <h2>Create New Role</h2>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{--<p style="color: red">{{ session('error') }}</p>--}}
        <p style="color: red">{{ Session::get('error') }}</p>
    </div>
@endif

<form action=" {{route('roles.store', ['id' => $id])}}" method="post" autocomplete="off">
    @if($id !== null)
        <input type="hidden" name="id" value="{{ $id }}">
    @endif
    @csrf
    {{--@php dump($id); die(); @endphp--}}
    <label for="role">Role</label>
    <input type="text" name="role" id="role" placeholder="" value="{{ $record !== null ? $record['role'] :'' }}">
    {{--<input type="text" name="role" id="role" placeholder="Add new role..."><br/>--}}
    <input type="submit" value="Add Role">
</form>
    <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver</a>
</body>
</html>
