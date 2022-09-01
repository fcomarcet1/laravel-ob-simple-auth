<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        {{-- Include table in partial template with variable--}}
        @include('user._section.row', ['user' => $user])
    @endforeach
    </tbody>
</table>
