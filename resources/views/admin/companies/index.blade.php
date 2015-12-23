@extends('admin_master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="booking-title">Admin</h3>
            </div>
            <div class="col-md-6 text-right">
                <div class="gap gap-small"></div>
                <a href="{{ route('admin.travel-companies.create') }}" class="btn btn-primary" title="">New Travel Company</a>
            </div>
        </div>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="col-md-12">
                <table class="table table-bordered table-striped table-booking-history" id="bT">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($travel_companies as $tc)
                            <tr>
                                <td>{{ $tc -> name }}</td>
                                <td>{{ $tc -> email }}</td>
                                <td>{{ $tc -> phone }}</td>
                                <td>
                                    
                                        <a href="{{ route('admin.travel-companies.edit', [$tc]) }}" class="btn btn-warning btn-block btn-xs" title="">edit</a>
                                    
                                        
                                    @if (strtolower(Auth::staff()->get()->role->name) == 'admin' OR strtolower(Auth::staff()->get()->role->name) == 'super admin')
                                            {!! Form::open(['method' => 'DELETE', 'action'=>['TravelCompaniesController@destroy', $tc]]) !!}
                                            <button type="submit" onclick="confirm('Are You Sure?')" class="third btn btn-danger btn-block btn-xs">Delete</button>
                                            {!! Form::close() !!}
                                    @endif
                                        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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