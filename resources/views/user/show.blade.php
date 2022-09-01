@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-10">
        <h2>User Detail</h2>
        {{-- show flash message --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{--<p style="color: green">{{ session('success') }}</p>--}}
                <p style="color: green">{{ Session::get('success') }}</p>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['lastname'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <a href="{{ route('user.edit', ['id' => $user['id']]) }}" class="btn btn-primary">Edit</a>
                    {{--<a href="{{ route('roles.delete', ['id' => $role['id']]) }}" class="btn btn-danger">Delete</a>--}}
                    <form method="post"
                          onsubmit='return confirm("Are you sure you want to delete: {{ $user['name'] }} User?")'
                          action="{{ route('user.delete', ['id' => $user['id']])  }}"
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
        <a href="{{ route('types.index') }}" class="btn btn-success">volver</a>
    </div>
</div>

