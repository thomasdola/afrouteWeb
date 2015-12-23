@extends('master')


@section('content')

	<div class="container">
            <h1 class="page-title" style="color: #ed8323;">Contact Us</h1>
        </div>




        {{-- <div id="map-canvas" style="height:400px;"></div> --}}
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-7">
                    <p><b>Afroute</b> doors and ears are open to your concerns, suggestions and feedback and your partnerships in order to provide you with the best service delivery you deserve.</p>
                    <h5><strong>Partners</strong></h5>
                    <p>If you are a transport company and you are interested in being listed on Afroute contact our sales dept. on +233-244997836 / +233-248089578</p>
                    {!! Form::open(['class'=>'mt30', 'action'=>'PagesController@sendFeedback']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" min="10" type="text" name="name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="email" name="email" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="message" required></textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Send Message" />
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <aside class="sidebar-right">
                        <ul class="address-list list">
                            <li>
                                <h5>Email</h5><a href="mailto:support@afroute.com?subject=feedback">support@afroute.com</a>
                            </li>
                            <li>
                                <h5>Marketing</h5><a href="#">+233-244997836 / +233-248089578</a>
                            </li>
                            <li>
                                <h5>Operations</h5><a href="#">+233-208134588 / +233-243283840</a>
                            </li>
                            <li>
                                <h5>Technical</h5><a href="#">+233-248089578 / +233-246896111</a>
                            </li>
                            <li>
                                <h5>Address</h5><address> Achiaa House 2nd Floor <br/>
                                Achimota Mile 7 Junction <br/>
Accra Ghana
</address>
                                
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            </div>

            @if (Session::has('info'))
                <div class="alert success-info">
                    {{ Session::get('info') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert search-error">
                    @foreach ($errors->all() as $e)
                        {{ $e }}
                    @endforeach
                </div>
            @endif

@endsection