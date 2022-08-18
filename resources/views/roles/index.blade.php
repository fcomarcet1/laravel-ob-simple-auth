<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Css bootstrap cdn--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Css custom--}}
</head>
<body>
<h2>Roles List</h2>
{{-- show flash message --}}
@if(Session::has('success'))
    <div class="alert alert-success">
        {{--<p style="color: green">{{ session('success') }}</p>--}}
        <p style="color: green">{{ Session::get('success') }}</p>
    </div>
@endif
<a href="{{ route('roles.create') }}" class="btn btn-success">Create new role</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role['id'] }}</td>
            <td>{{ $role['role'] }}</td>
            <td>{{ date("d-m-Y H:i:s", strtotime($role['created_at']))  }}</td>
            <td>{{ date("F j, Y, g:i a", strtotime($role['updated_at'])) }}</td>
            <td>
                <a href="{{ route('roles.show', $role['id']) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('roles.edit', $role['id']) }}" class="btn btn-warning">Edit</a>

                {{--<a href="javascript:void(0)" onclick="document.getElementById('delete').submit();">Delete</a>
                <form method="post" action="{{ route('roles.delete', $role['id']) }}" id="delete" style="display: none">
                    @csrf
                </form>--}}

                <form method="post" action="{{ route('roles.delete', ['id' => $role['id']])  }}" id="delete">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
