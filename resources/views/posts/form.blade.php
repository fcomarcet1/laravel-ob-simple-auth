@extends('layouts.base')
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-5">
        @if(isset($id) && $id !== null)
            <h2>Edit Post</h2>
        @else
            <h2>Create New Post</h2>
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
            <form action=" {{ route('post.store') }}" method="post" autocomplete="off">
                @if($id !== null)
                    <input type="hidden" name="id" value="{{ $record['id'] }}">
                @endif
                @csrf
                <label class="form-label" for="title">title</label>
                <input class="form-control" type="text" name="title" id="title"
                       value="{{ $record !== null ? $record['title'] :'' }}" placeholder="Add title" ><br/>
                <label class="form-label" for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug"
                       value="{{ $record !== null ? $record['slug'] :'' }}" placeholder="Add slug" ><br/>
                <label class="form-label" for="content">Content</label>
                <input class="form-control" type="text" name="content" id="content"
                       value="{{ $record !== null ? $record['content'] :'' }}" placeholder="Add content"><br/>
                <input class="btn btn-primary" type="submit" value="{{ $id !== null ? 'Edit Post' :'Add new Post' }}">
            </form>
        </div>
    </div>
</div>
