@extends('layouts.base')
@section('title', 'Roles')
@section('main')
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="row justify-content-center py-5">
        <div class="col-12 col-md-10">
            <h2>Post List</h2>
            <a href="{{ route('post.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>Add new post
            </a>
            {{-- <button type="button" class="btn btn-primary"><span class="bi bi-plus"></span> Sample Button</button> --}}
            @include('auth.logout')
            @include('posts._section.table', ['posts' => $posts])
            <a href="{{ route('home') }}" class="btn btn-success">volver</a>
        </div>
    </div>
@endsection

