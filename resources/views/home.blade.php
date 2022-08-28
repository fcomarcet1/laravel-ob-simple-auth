@extends('layouts.base')
<body>
    <div class="container py-5">
        <h1>Home Page</h1>
        <p>This is the homepage of {{ env('APP_NAME') }}</p>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{--<p style="color: red">{{ session('error') }}</p>--}}
                <p>{{ Session::get('success') }}</p>
                <p style="color: red">{{ Session::get('error') }}</p>

            </div>
        @endif
        {{--<h2>Welcome {{)}}</h2>--}}
        {{-- Create login, register  a href--}}
        @if(Session::has('user'))
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles</a>
            <a href="{{ route('types.index') }}" class="btn btn-success">Types</a>
            <a href="{{ route('user.index') }}" class="btn btn-warning">Users</a>
            <a href="{{ route('custom-blade-directive') }}" class="btn btn-dark">Custom blade Directive</a>
            @include('auth.logout')
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endif
    </div>
