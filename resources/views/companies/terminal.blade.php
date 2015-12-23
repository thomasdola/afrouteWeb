@extends('master')


@section('content')

	<div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('all_companies') }}">All Travel Terminals</a>
            </li>
            <li class="active">{{ $company->name }}</li>
        </ul>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="lh1em">{{ $company->name }}</h2>
                        <p class="lh1em text-small"><i class="fa fa-map-marker"></i> {{ $company->address }}</p>
                        <ul class="list list-inline text-small">
                            <li><a href="{{ route('contact_us') }}"><i class="fa fa-envelope"></i>Contact Us</a>
                            {{-- </li> --}}
                            {{-- <li><a href="{{ $company->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i> Social Page</a> --}}
                            {{-- </li> --}}
                            {{-- <li><i class="fa fa-phone"></i> {{ $company->phone }}</li> --}}
                        </ul>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-8">
                    <div class="tabbable booking-details-tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                            </li>
                            {{-- <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                            </li> --}}
                            <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-bars"></i>Stations</a>
                            </li>
                            {{-- <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-comments"></i>Reviews</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <!-- START LIGHTBOX GALLERY -->
                                <div class="row row-no-gutter" id="popup-gallery">
                                    <div class="col-md-12">
                                        <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                                            @if($images->count() > 0)
                                                @foreach($images as $im)
                                                    <img src="{{ asset($im->path) }}"/>
                                                @endforeach
                                            @elseif(!$images->count() > 0)
                                                <img src="{{ asset('img/800x600.png') }}"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- END LIGHTBOX GALLERY -->
                            </div>
                            {{-- <div class="tab-pane fade" id="google-map-tab">
                                <div id="map-canvas" style="width:100%; height:500px;">
                                    <a href="https://maps.googleapis.com/maps/api/staticmap?center=Berkeley,CA&zoom=14&size=400x400" title=""></a>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade" id="tab-3">
                                <div class="mt20">
                                    <table class="table table-bordered table-striped table-booking-history">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>State/Region</th>
                                                <th>City</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stations as $s)
                                                <tr>
                                                    <td>{{ $s -> country }}</td>
                                                    <td>{{ $s -> region }}</td>
                                                    <td>{{ $s -> city }}</td>
                                                    <td>{{ $s -> location }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-4">
                                <div class="mt20">
                                    <div class="text-right mb10">
                                        @if (Auth::user()->get())
                                            <a class="popup-text btn btn-primary" href="#reviewBox" data-effect="mfp-zoom-out">Write a review</a>
                                        @endif
                                    </div>
                                    <ul class="booking-item-reviews list">
                                        @foreach ($reviews as $r)
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="booking-item-review-person">
                                                            <p class="booking-item-review-person-name"><a href="#">{{ $r -> user -> name }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="booking-item-review-content">
                                                            <p>{!! $r -> body !!} 
                                                            </p>
                                                            <p class="text-small mt20">Reviewed on {{ $r -> created_at -> toFormattedDateString() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="row wrap">
                                        <div class="col-md-5">
                                            <p><small>1190 reviews on this activity. &nbsp;&nbsp;Showing 1 to 7</small>
                                            </p>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="pagination">
                                                <li class="active"><a href="#">1</a>
                                                </li>
                                                <li><a href="#">2</a>
                                                </li>
                                                <li><a href="#">3</a>
                                                </li>
                                                <li><a href="#">4</a>
                                                </li>
                                                <li><a href="#">5</a>
                                                </li>
                                                <li><a href="#">6</a>
                                                </li>
                                                <li><a href="#">7</a>
                                                </li>
                                                <li class="dots">...</li>
                                                <li><a href="#">43</a>
                                                </li>
                                                <li class="next"><a href="#">Next Page</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right mt10">
                                        @if (Auth::user()->get())
                                            <a class="popup-text btn btn-primary" href="#reviewBox" data-effect="mfp-zoom-out">Write a review</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gap gap-small">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="color: orange;">Bus Features</h3>
                            <ul class="list list-unstyled text-bigger">
                                @foreach($bus_features as $f)
                                    <li><i class="{{ $f->icon }}"></i> {{ $f -> name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="color: orange;">Description</h3>
                            <div class="text-justify text-bigger">
                                {!! $company->description !!}
                            </div>
                        </div>
                    </div>

                    <div class="gap gap-small">
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>
        <div id="reviewBox" class="mfp-with-anim mfp-hide mfp-dialog">
            {!! Form::open(['action'=>'CustomersController@post_review', 'post-remote']) !!}
                <div class="form-group">
                    <label for="reveiw">Your Review</label>
                    <textarea name="body" required rows="3" class="form-control" cols="35"></textarea>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->get() ? Auth::user()->get()->id : '' }}">
                <input type="hidden" name="travel_company_id" value="{{ $company->id }}">
                <div class="form-group text-right">
                    <input type="submit" value="share" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')

    <script type="text/javascript">
        $('ol, ul').addClass('list list-unstyled');
    </script>

@endsection