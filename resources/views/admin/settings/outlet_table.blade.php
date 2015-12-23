<thead>
    <tr>
        <th>Outlets</th>
        <th>Location</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($outlets as $outlet)
        <tr>
            <td>{{ $outlet -> name }}</td>
            <td>{{ $outlet -> location }}</td>
            <td>{{ $outlet -> type }}</td>
            <td>{{ $outlet -> operator }}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'data-delete', 'action'=>['OutletsController@delete', $outlet->id]]) !!}
                <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</tbody>