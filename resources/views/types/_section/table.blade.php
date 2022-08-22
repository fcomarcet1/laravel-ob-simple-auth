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
    @foreach($types as $type)
        {{-- Include table in partial template with variable--}}
        @include('types._section.row', ['type' => $type])
    @endforeach
    </tbody>
</table>
