@extends('layouts.base')


<div class="container py-5">
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{--<p style="color: red">{{ session('error') }}</p>--}}
            <p style="color: red">{{ Session::get('error') }}</p>
        </div>
    @endif
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


{{--<form action="{{ route('login') }}" method="post" autocomplete="off">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email"><br/>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password"><br/>
    <input type="submit" value="Login">
</form>--}}

