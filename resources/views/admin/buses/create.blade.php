@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-4 col-md-offset-2">
                <h2>Bus Details</h2>
                {!! Form::open(['route'=>'bus_rental_save_bus', 'method'=>'post', 'files'=>true]) !!}
                    <div class="form-group">
                        <label for="">Bus Name</label>
                        <input required type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="eg: 45 Seater">
                    </div>
                    <div class="form-group">
                        <label>Features</label>
                        <select required name="features[]" multiple class="form-control" id="feature_list">
                            @foreach ($features as $f)
                                <option value="{{ $f->id }}">{{ ucwords($f->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bus Image<input required type="file" name="images[]" class="form-control" multiple></label>
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="" value="Add">
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

@section('scripts')

    <script type="text/javascript" charset="utf-8">
        $('#feature_list').select2();
    </script>

@endsection