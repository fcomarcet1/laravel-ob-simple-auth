<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Css bootstrap cdn--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Css custom--}}
</head>
<body>
<h2>Roles List</h2>
{{-- show flash message --}}
@if(Session::has('success'))
    <div class="alert alert-success">
        {{--<p style="color: green">{{ session('success') }}</p>--}}
        <p style="color: green">{{ Session::get('success') }}</p>
    </div>
@endif
{{--@php
dump($role); die();
@endphp--}}
<a href="{{ route('roles.create') }}" class="btn btn-success">Create new role</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $role['id'] }}</td>
        <td>{{ $role['role'] }}</td>
        <td>
            <a href="{{ route('roles.edit', ['id' => $role['id']]) }}" class="btn btn-primary">Edit</a>
            {{--<a href="{{ route('roles.delete', ['id' => $role['id']]) }}" class="btn btn-danger">Delete</a>--}}
            <form method="post"
                  action="{{ route('roles.delete', ['id' => $role['id']])  }}"
                  id="delete"
                style="display: inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    </tbody>
</table>
<a href="{{ route('roles.index') }}" class="btn btn-success">volver</a>
</body>
</html>
