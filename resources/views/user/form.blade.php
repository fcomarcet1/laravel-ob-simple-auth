@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-5">
        @if(isset($id) && $id !== null)
            <h2>Edit User</h2>
        @else
            <h2>Create New User</h2>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-danger">
                {{--<p style="color: red">{{ session('error') }}</p>--}}
                <p style="color: red">{{ Session::get('success') }}</p>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{--<p style="color: red">{{ session('error') }}</p>--}}
                <p style="color: red">{{ Session::get('error') }}</p>
            </div>
        @endif
        <div class="form-group"></div>
            <form action=" {{ route('user.store') }}" method="post" autocomplete="off">
                @if($id !== null)
                    <input type="hidden" name="id" value="{{ $id }}">
                @endif
                @csrf
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name"
                       value="{{ $record !== null ? $record['name'] :'' }}" placeholder="Add name" ><br/>
                <label class="form-label" for="name">Last Name</label>
                <input class="form-control" type="text" name="lastname" id="lastname"
                       value="{{ $record !== null ? $record['lastname'] :'' }}" placeholder="Add name last name" ><br/>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email"
                       value="{{ $record !== null ? $record['email'] :'' }}" placeholder="Add email"><br/>
                <input class="btn btn-primary" type="submit" value="{{ $id !== null ? 'Edit User' :'Add new User' }}">
            </form>
        </div>
    </div>
</div>
