<div class="table-responsive">
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
            {{-- Include table in partial template with variable--}}
            @include('roles._section.row', ['role' => $role])
        @endforeach
        </tbody>
    </table>
</div>
