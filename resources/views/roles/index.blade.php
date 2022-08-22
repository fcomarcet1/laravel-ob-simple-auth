@extends('layouts.base')
@section('title', 'Roles')
@section('main')
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="container py-5">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i>Add new role
        </a>
        {{-- <button type="button" class="btn btn-primary"><span class="bi bi-plus"></span> Sample Button</button> --}}
        @include('auth.logout')
        @include('roles._section.table', ['roles' => $roles])
        <a href="{{ route('home') }}" class="btn btn-success">volver</a>
    </div>
@endsection




{{--
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    --}}
{{-- Css bootstrap cdn--}}{{--

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    --}}
{{-- Css custom--}}{{--

</head>
<body>
<h2>Roles List</h2>
@include('auth.logout')
--}}
{{-- show flash message --}}{{--

@if(Session::has('success'))
    <div class="alert alert-success">
{{--<p style="color: green">{{ session('success') }}</p>--}}{{--

        <p style="color: green">{{ Session::get('success') }}</p>
    </div>
@endif
<a href="{{ route('roles.create') }}" class="btn btn-success">Create new role</a>
@include('roles._section.table', ['roles' => $roles])
<a href="{{ route('home') }}" class="btn btn-success">volver</a>
</body>
</html>
--}}
