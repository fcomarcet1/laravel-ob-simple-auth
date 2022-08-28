@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-5">
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{--<p style="color: red">{{ session('error') }}</p>--}}
                <p style="color: red">{{ Session::get('error') }}</p>
            </div>
        @endif
        <h1>Registration</h1>
        <form action="{{ route('register') }}" method="post" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ route('welcome') }}">Volver</a>
        </form>

    </div>
</div>

