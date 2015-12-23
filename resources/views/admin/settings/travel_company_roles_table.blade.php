<thead>
    <tr>
        <th>Bus Features</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($travel_company_roles as $r)
        <tr>
            <td>{{ $r -> name }}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'data-delete', 'action'=>['TravelCompanyStaffRolesController@delete', $r->id]]) !!}
                <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</tbody>