<tr>
    <td>{{ $post['id'] }}</td>
    <td>{{ $post['title'] }}</td>
    <td>{{ $post['slug'] }}</td>
    <td>{{ date("d-m-Y H:i:s", strtotime($post['created_at']))  }}</td>
    <td>{{ date("F j, Y, g:i a", strtotime($post['updated_at'])) }}</td>
    <td>
        <a href="{{ route('post.show', $post['id']) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-warning">Edit</a>

        {{--<a href="javascript:void(0)" onclick="document.getElementById('delete').submit();">Delete</a>
        <form method="posts" action="{{ route('roles.delete', $type['id']) }}" id="delete" style="display: none">
            @csrf
        </form>--}}

        <form method="post"
              onsubmit="return confirm('Are you sure you want to delete this Post?')"
              action="{{ route('post.delete', ['id' => $post['id']])  }}"
              id="delete">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
