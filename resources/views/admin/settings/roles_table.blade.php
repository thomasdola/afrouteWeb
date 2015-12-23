<thead>
    <tr>
        <th>Roles</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($roles as $r)
        <tr>
            <td>{{ $r -> name }}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'data-delete', 'action'=>['RolesController@delete', $r->id]]) !!}
                <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</tbody>