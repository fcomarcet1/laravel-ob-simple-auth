@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-5">
        @if($id !== null)
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
            <input class="form-control"
                   type="text"
                   name="role"
                   id="role"
                   placeholder=""
                   value="{{ $record !== null ? $record['role'] :'' }}">
            {{--<input type="text" name="role" id="role" placeholder="Add new role..."><br/>--}}
            <input class="btn btn-primary" type="submit" value="Add Role">
        </form>
        <a href="{{ route('roles.index') }}" class="btn btn-warning">Volver</a>
    </div>

</div>
