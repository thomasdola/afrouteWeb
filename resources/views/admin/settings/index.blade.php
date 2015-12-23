@extends('admin_master')


@section('content')

	<div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="tabbable">  
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-1" data-toggle="tab">First</a>
                        </li>
                        <li><a href="#tab-2" data-toggle="tab">Second</a>
                        </li>
                        <li><a href="#tab-3" data-toggle="tab">Third</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <div class="gap gap-mini"></div>
                            <div class="row">
                                
                                <div class="col-md-5">
                                    <div class="col-md-12">
                                        {!! Form::open(['class'=>'form form-inline', 'method'=>'post','data-remote', 'action'=>'RolesController@store', 'id'=>'first']) !!}
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="" placeholder="Role Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                            </div>
                                        {!! Form::close() !!}
                                        <div class="gap"></div>
                                        <table class="table table-bordered table-striped table-booking-history text-center" id="first">
                                            <thead>
                                                <tr>
                                                    <th>Roles</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $r)
                                                    <tr>
                                                        <td>{{ $r -> name }}</td>
                                                        <td>
                                                            {!! Form::open(['method' => 'DELETE', 'data-delete', 'action'=>['RolesController@delete', $r->id]]) !!}
                                                            <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="gap"></div>
                                    <div class="col-md-12">
                                        {!! Form::open(['class'=>'form form-inline', 'id'=>'second', 'method'=>'post', 'data-remote', 'action'=>'TravelCompanyStaffRolesController@store']) !!}
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="" placeholder="Bus Feature">
                                            </div>
                                            <div class="gap gap-mini"></div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="icon" value="" placeholder="Feature Icon">
                                            </div>
                                            <div class="gap gap-mini"></div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" name="" value="Add">
                                            </div>
                                        {!! Form::close() !!}
                                        <div class="gap"></div>
                                        <table class="table table-bordered table-striped table-booking-history text-center" id="second">
                                            <thead>
                                                <tr>
                                                    <th>Bus Features</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bus_features as $r)
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
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    {!! Form::open(['action'=>'OutletsController@store', 'data-remote', 'method'=>'post', 'id'=>'third']) !!}
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="" placeholder="Outlet">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="location" value="" placeholder="Loction">
                                        </div>
                                        <div class="form-group">
                                            <select name="type" class="form-control">
                                                <option value="CashCard">CashCard</option>
                                                <option value="SpeedBank">SpeedBank</option>
                                                <option value="Mobile Money">Mobile Money</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="operator" class="form-control">
                                                <option value="Voda Cash">Voda Cash</option>
                                                <option value="Airtel Money">Airtel Money</option>
                                                <option value="Tigo Cash">Tigo Cash</option>
                                                <option value="MTN Mobile Money">MTN Mobile Money</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="" value="Add">
                                        </div>
                                    {!! Form::close() !!}
                                    <div class="gap"></div>
                                    <table class="table table-bordered table-striped table-booking-history text-center" id="third">
                                        <thead>
                                            <tr>
                                                <th>Outlets</th>
                                                <th>Location</th>
                                                <th>Type</th>
                                                <th>Operator</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($outlets as $outlet)
                                                <tr>
                                                    <td>{{ $outlet -> name }}</td>
                                                    <td>{{ $outlet -> location }}</td>
                                                    <td>{{ $outlet -> type }}</td>
                                                    <td>{{ $outlet -> operator }}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'data-delete', 'action'=>['OutletsController@delete', $outlet->id]]) !!}
                                                        <button type="submit" class="third btn btn-danger btn-block btn-xs">Delete</button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <div class="gap gap-mini"></div>
                            <div class="col-md-4">
                                {!! Form::open(['action'=>'FaqsController@store', 'method'=>'post']) !!}
                                    <div class="form-group">
                                        <label for="">Question</label>
                                        <input type="text" class="form-control" name="question" value="" placeholder="Question">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Answer</label>
                                        <textarea name="answer" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="" value="Add">
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-6 col-md-offset-1">
                                <h4>FAQs</h4>
                                <div class="panel-group" id="accordion">
                                    @foreach ($faqs as $f)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" contenteditable id="{{ $f->id }}" data-token = "{{ csrf_token() }}">{{ $f -> question }}</a></h4>
                                            </div>
                                            <div class="panel-collapse collapse in" id="collapse-1">
                                                <div id="{{ $f->id }}" class="panel-body" contenteditable data-token = "{{ csrf_token() }}" >{{ $f -> answer }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
                            <div class="gap gap-mini"></div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <p>Last Backup:</p>
                                </div>
                                <div class="gap"></div>
                                <div class="col-md-12">
                                    <a href="" class="btn btn-primary" title="">System Backup</a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    {!! Form::open(['method'=>'get', 'action'=>'CashCardController@generate']) !!}
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="price" value="" placeholder="Price" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="number" name="number" value="" placeholder="How many?" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" name="" class="btn btn-primary" value="Generate">
                                            </div>
                                        </div>
                                        
                                    {!! Form::close() !!}
                                </div>
                                <div class="gap"></div>
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection