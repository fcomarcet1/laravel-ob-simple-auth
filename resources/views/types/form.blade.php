@extends('layouts.base')
<div class="container py-5">
    @if($id !== null)
        <h2>Edit Type</h2>
    @else
        <h2>Create New Type</h2>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{--<p style="color: red">{{ session('error') }}</p>--}}
            <p style="color: red">{{ Session::get('error') }}</p>
        </div>
    @endif
    <form action="{{ route('types.store') }}" method="post" autocomplete="off">
        @csrf
        <label for="type">Type</label>
        <input type="text" name="type" id="type" placeholder="" value="{{ $record !== null ? $record['role'] :'' }}">
        <input class="btn btn-primary" type="submit" value="Edit Type">
    </form>
    <a href="{{ route('types.index') }}" class="btn btn-success">volver</a>
</div>
