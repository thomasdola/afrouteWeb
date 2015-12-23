@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-4 col-md-offset-2">
                <h2>Bus Details</h2>
                {!! Form::model($bus, ['route'=>['bus_rental_update_bus', $bus->id], 'method'=>'put', 'files'=>true]) !!}
                    <div class="form-group">
                        <label for="">Bus Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $bus->name }}">
                    </div>
                    <div class="form-group">
                        <label>Features</label>
                        
                        {!! Form::select('features[]', $features->lists('name','id'), $features_l, ['id' => 'feature_list', 'class' => 'form-control', 'multiple']) !!}
                    </div>
                    <div class="form-group">
                        <label>Bus Image<input type="file" name="images[]" class="form-control" multiple></label>
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="" value="Update">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('bus_rental_index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="gap"></div>
            @if ($errors -> any())
                @include('partials.errors')
            @endif
        </div>
        <div class="gap"></div>
    </div>


@endsection
