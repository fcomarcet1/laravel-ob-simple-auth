@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-8">
        <h2>Roles Detail</h2>
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
                          onsubmit="return confirm('Are you sure you want to delete this role?')"
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
    </div>
</div>
