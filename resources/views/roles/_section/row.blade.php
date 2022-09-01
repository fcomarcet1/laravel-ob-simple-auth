<tr>
    <td>{{ $role['id'] }}</td>
    <td>{{ $role['role'] }}</td>
    <td>{{ date("d-m-Y H:i:s", strtotime($role['created_at']))  }}</td>
    <td>{{ date("F j, Y, g:i a", strtotime($role['updated_at'])) }}</td>
    <td>
        <a href="{{ route('roles.show', $role['id']) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('roles.edit', $role['id']) }}" class="btn btn-warning">Edit</a>

        {{--<a href="javascript:void(0)" onclick="document.getElementById('delete').submit();">Delete</a>
        <form method="posts" action="{{ route('roles.delete', $role['id']) }}" id="delete" style="display: none">
            @csrf
        </form>--}}
            <form method="post"
                  onsubmit="return confirm('Are you sure you want to delete this role?')"
                  action="{{ route('roles.delete', ['id' => $role['id']])  }}"
                  id="delete">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
    </td>
</tr>
