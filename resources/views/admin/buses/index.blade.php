@extends('admin_master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="booking-title">Admin</h3>
            </div>
            <div class="col-md-6 text-right">
                <div class="gap gap-small"></div>
                <a href="{{ route('bus_rental_add_bus') }}" class="btn btn-primary" title="">New Bus</a>
            </div>
        </div>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="col-md-12">
                <table class="table table-bordered table-striped table-booking-history" id="bT">
                    <thead>
                        <tr>
                            <th>Bus Name</th>
                            <th>Bus Features</th>
                            <th>Bus Pictures</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buses as $b)
                            <tr>
                                <td>{{ $b -> name }}</td>
                                <td>
                                    @foreach ($b->bus_features as $f)
                                        {{ $f -> name }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($b->bus_images as $i)
                                    <div class="col-md-3">
                                        <img src="{{ asset($i -> path) }}">
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    
                                        <a href="{{ route('bus_rental_edit_bus', [$b->id]) }}" class="btn btn-warning btn-block btn-xs" title="">edit</a>
                                    
                                        
                                    @unless ($b -> rents)
                                            {!! Form::open(['method' => 'DELETE', 'action'=>['BusesController@deleteBus', $b->id]]) !!}
                                            <button type="submit" onclick="confirm('Are You Sure?')" class="third btn btn-danger btn-block btn-xs">Delete</button>
                                            {!! Form::close() !!}
                                    @endunless
                                        
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