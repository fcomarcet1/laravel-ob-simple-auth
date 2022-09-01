<tr>
    <td>{{ $type['id'] }}</td>
    <td>{{ $type['role'] }}</td>
    <td>{{ date("d-m-Y H:i:s", strtotime($type['created_at']))  }}</td>
    <td>{{ date("F j, Y, g:i a", strtotime($type['updated_at'])) }}</td>
    <td>
        <a href="{{ route('types.show', $type['id']) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('types.edit', $type['id']) }}" class="btn btn-warning">Edit</a>

        {{--<a href="javascript:void(0)" onclick="document.getElementById('delete').submit();">Delete</a>
        <form method="posts" action="{{ route('roles.delete', $type['id']) }}" id="delete" style="display: none">
            @csrf
        </form>--}}

        <form method="post"
              onsubmit="return confirm('Are you sure you want to delete this Type?')"
              action="{{ route('types.delete', ['id' => $type['id']])  }}"
              id="delete">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
