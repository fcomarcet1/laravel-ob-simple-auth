<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>title</th>
        <th>slug</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $posts as $post )
        {{-- Include table in partial template with variable--}}
        @include('posts._section.row', ['post' => $post])
    @endforeach
    </tbody>
</table>
