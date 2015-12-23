@extends('admin_master')


@section('content')

<div class="container">
    <h3 class="booking-title">Press Center</h3>
    <div class="row">
        @include('partials.admin_account_aside')
        <div class="col-md-9">
            <div class="row">
                {{-- <div class="col-md-2 col-md-offset-10">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create New Article</a>
                </div> --}}
            </div>
            <div class="gap gap-small"></div>
            {!! Form::open(['class'=>'form', 'route'=>'admin.articles.store', 'files'=>true]) !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Article title" class="form-control">
                </div>
                <hr>
                <div class="form-group">
                    <label for="artBody">Body</label>
                    <textarea name="body" id="artBody" class="form-control" rows="20">
                        
                    </textarea>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publishDate">Publish At</label>
                            <input type="text" name="published_at" class="form-control date-pick">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Picture(s)</label>
                            {!! Form::file('image', ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="gap gap-mini"></div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="form-group">
                            <a href="{{ route('admin.articles.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="gap"></div>
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function()
            {

            });
    </script>

@endsection