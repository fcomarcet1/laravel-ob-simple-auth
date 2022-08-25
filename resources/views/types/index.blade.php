@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-10">
        <h2>Types List</h2>
        {{-- show flash message --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{--<p style="color: green">{{ session('success') }}</p>--}}
                <p style="color: green">{{ Session::get('success') }}</p>
            </div>
        @endif
        <a href="{{ route('types.create') }}" class="btn btn-success">Create new Type</a>
            @include('auth.logout')
            @include('types._section.table', ['types' => $types])
        <a href="{{ route('home') }}" class="btn btn-primary">volver</a>
    </div>
</div>
