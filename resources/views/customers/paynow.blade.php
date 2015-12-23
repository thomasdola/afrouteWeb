@extends('master')

@section('content')

	<div class="container">
            <h1 class="page-title">Profile</h1>
        </div>




        <div class="container">
            <div class="row">
                

                @include('partials.customer_profile_aside')


                <div class="col-md-5 col-md-offset-2">
                    <div class="panel">
                        {!! Form::open(['action'=>'CustomersController@pay_reserve_booking_now', 'method'=>'patch']) !!}
                           <div class="form-group">
                               <label for="code">Your CashCard Code</label>
                               <input name="cashcard_code" class="form-control" placeholder="xxxx-xxxx-xxxx" id="card"></input>
                               <input type="hidden" name="booking_id" value="{{ $id }}">
                           </div>
                           <div class="form-group text-right">
                               <input type="submit" value="pay now" class="btn btn-primary btn-block">
                           </div>
                        {!! Form::close() !!}
                        {{-- <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#tab-1" data-toggle="tab">CashCard</a>
                                </li>
                                <li><a href="#tab-2" data-toggle="tab">SpeedBanking</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-1">
                                    {!! Form::open(['action'=>'CustomersController@pay_reserve_booking_now', 'method'=>'patch']) !!}
                                       <div class="form-group">
                                           <label for="code">Your CashCard Code</label>
                                           <input name="cashcard_code" class="form-control" placeholder="xxxx-xxxx-xxxx"></input>
                                           <input type="hidden" name="booking_id" value="{{ $id }}">
                                       </div>
                                       <div class="form-group text-right">
                                           <input type="submit" value="pay now" class="btn btn-primary btn-block">
                                       </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade" id="tab-2">
                                    {!! Form::open(['action'=>'CustomersController@pay_reserve_booking_now', 'method'=>'patch']) !!}
                                        <div class="form-group">
                                            <label for="reveiw">Your SpeedBanking Code</label>
                                            <input name="speedBanking_code" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx"></input>
                                            <input type="hidden" name="booking_id" value="{{ $id }}">
                                        </div>
                                        <div class="form-group text-right">
                                            <input type="submit" value="pay now" class="btn btn-primary btn-block">
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">
    
    $(function(){
        $('#card').mask('****-****-****');
    })

</script>


@endsection