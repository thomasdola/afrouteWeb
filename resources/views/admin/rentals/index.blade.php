@extends('admin_master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="booking-title">Admin</h3>
            </div>
        </div>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="col-md-12">
                <table class="table table-bordered table-striped table-booking-history" id="bT">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Bus Type</th>
                            <th>Trip Type</th>
                            <th>Number Of Buses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $r)
                            <tr>
                                <td>{{ $r -> customer_name }}</td>
                                <td>{{ $r -> bus -> name }}</td>
                                <td>{{ ucwords(str_replace("_", " ", $r -> trip_type)) }}</td>
                                <td>{{ $r -> number_of_bus }}</td>
                                <td>
                                    <a href="{{ route('rental_view', $r->id) }}" title="view" class="btn btn-xs btn-default btn-block">
                                       <i class="fa fa-eye"></i> 
                                    </a>
                                </td>
                                {{-- <td>
                                    {!! Form::open(['method' => 'DELETE', 'action'=>['RentalsController@delete', $r->id]]) !!}
                                    <button type="submit" class="third btn btn-success btn-block btn-xs"><i class="fa fa-check"></i></button>
                                    {!! Form::close() !!}                                    
                                </td> --}}
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