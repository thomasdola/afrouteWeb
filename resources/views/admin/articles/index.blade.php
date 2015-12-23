@extends('admin_master')


@section('content')

    <div class="container">
            <h3 class="booking-title">Press Center</h3>
            <div class="row">
                @include('partials.admin_account_aside')
                <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2 col-md-offset-10">
                        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create New Article</a>
                    </div>
                </div>
                <div class="gap gap-small"></div>
                   <div class="tabbable">
                       <ul class="nav nav-tabs" id="myTab">
                           <li class="active">
                               <a href="#published" data-toggle="tab">Published</a>
                           </li>
                           <li>
                               <a href="#unpublished" data-toggle="tab">Unpublished</a>
                           </li>
                       </ul>
                       <div class="tab-content">
                           <div class="tab-pane fade in active" id="published">
                           <div class="gap gap-mini"></div>
                               <table class="table table-bordered table-striped table-hover">
                                   <thead>
                                       <tr>
                                           <th>Title</th>
                                           <th>Created at</th>
                                           <th>Published at</th>
                                           <th>Actions</th>
                                       </tr>
                                   </thead>
                                   
                                   <tbody>
                                       @foreach ($p_articles as $a)
                                            <tr>
                                                <td>{{ $a -> title }}</td>
                                                <td>{{ $a -> created_at -> toFormattedDateString() }}</td>
                                                <td>{{ $a -> published_at }}</td>
                                                <td class="text-right">
                                                     <a href="{{ route('admin.articles.edit',[$a]) }}" class="btn btn-xs btn-warning" title="">Edit</a>
                                                     {!! Form::open(['style'=>'display: inline;', 'action'=>['ArticlesController@destroy', $a], 'method'=>'delete']) !!}
                                                         <input type="submit" value="Delete" class="btn btn-xs btn-danger">
                                                     {!! Form::close() !!}
                                                </td>
                                            </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                           <div class="tab-pane fade" id="unpublished">
                           <div class="gap gap-mini"></div>
                               <table class="table table-bordered table-striped table-hover">
                                   <thead>
                                       <tr>
                                           <th>Title</th>
                                           <th>Created at</th>
                                           <th>Publish Date</th>
                                           <th>Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($u_articles as $a)
                                            <tr>
                                                <td>{{ $a -> title }}</td>
                                                <td>{{ $a -> created_at -> toFormattedDateString() }}</td>
                                                <td>{{ $a -> published_at }}</td>
                                                <td class="text-right">
                                                     <a href="{{ route('admin.articles.edit',[$a]) }}" class="btn btn-xs btn-warning" title="">Edit</a>
                                                     {!! Form::open(['style'=>'display: inline;', 'action'=>['ArticlesController@destroy', $a], 'method'=>'delete']) !!}
                                                         <input type="submit" value="Delete" class="btn btn-xs btn-danger">
                                                     {!! Form::close() !!}
                                                </td>
                                            </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div> 
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection