<table class="table table-bordered">
    <thead>
        <tr>
            <th>Code</th>
            <th>Price</th>
            <th>Expiration Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codes as $code)
            <tr>
                <td>{{ $code -> code }}</td>
                <td>{{ $code -> price }}</td>
                <td>{{ $code -> created_at -> copy() -> addMonth() }}</td>
                <td>active</td>
            </tr>
        @endforeach
    </tbody>
</table>