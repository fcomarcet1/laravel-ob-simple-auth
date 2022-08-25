@extends('layouts.base')
@section('title', 'Users')
@section('main')
    <div class="row justify-content-center py-5">
        <div class="col-12 col-md-10">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <h2>Users List</h2>
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>Add new User
            </a>
            {{-- <button type="button" class="btn btn-primary"><span class="bi bi-plus"></span> Sample Button</button> --}}
            @include('auth.logout')
            @include('user._section.table', ['users' => $users])
            <a href="{{ route('home') }}" class="btn btn-success">volver</a>
        </div>
    </div>
@endsection
