<tr>
    <td>{{ $user['id'] }}</td>
    <td>{{ $user['name'] }}</td>
    <td>{{ $user['lastname'] }}</td>
    <td>{{ $user['email'] }}</td>
    <td>{{ date("d-m-Y H:i:s", strtotime($user['created_at']))  }}</td>
    <td>{{ date("F j, Y, g:i a", strtotime($user['updated_at'])) }}</td>
    <td>
        <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning">Edit</a>

        {{--<a href="javascript:void(0)" onclick="document.getElementById('delete').submit();">Delete</a>
        <form method="posts" action="{{ route('roles.delete', $type['id']) }}" id="delete" style="display: none">
            @csrf
        </form>--}}

        <form method="post"
              onsubmit="return confirm('Are you sure you want to delete this User?')"
              action="{{ route('user.delete', ['id' => $user['id']])  }}"
              id="delete">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
