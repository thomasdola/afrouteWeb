@extends('admin_master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="booking-title">Admin</h3>
            </div>
            <div class="col-md-6 text-right">
                <div class="gap gap-small"></div>
                <a href="{{ route('admin.staffs.create') }}" class="btn btn-primary" title="">New Staff</a>
            </div>
        </div>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <table class="table table-bordered table-striped table-booking-history" id="bT">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $staff -> name }}</td>
                                <td>{{ $staff -> email }}</td>
                                <td>{{ $staff -> phone }}</td>
                                <td>{{ $staff -> role -> name }}</td>
                                <td>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.staffs.edit', [$staff]) }}" class="btn btn-block btn-warning btn-xs" title="">edit</a>
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['UsersController@destroy', $staff ]]) !!}
                                        <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection

@section('scripts')

<script>
    $(function(){
        $('#bT').dataTable();
    })
</script>

@endsection