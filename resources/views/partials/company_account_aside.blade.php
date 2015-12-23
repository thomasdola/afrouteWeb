<div class="col-md-3">
    <aside class="user-profile-sidebar">
        <div class="user-profile-avatar text-center">
                <img src="{{ Auth::travel_company_staff()->get()->travel_company->travel_company_logo ? asset(Auth::travel_company_staff()->get()->travel_company->travel_company_logo->path) : asset('img/orangeLogo.png') }}" alt="Image Alternative text" title="AMaze" />
                
            <div class="col-md-12">{{ Auth::travel_company_staff()->get()->travel_company->name }}</div>
            <h5></h5>
            <p>Member Since {{ Auth::travel_company_staff()->get()->travel_company->created_at->toFormattedDateString() }}</p>
        </div>
        <ul class="list user-profile-nav">
            <li class="{{ Request::is('company/dashboard') ? "active" : '' }}">
                <a href="{{ route('company_dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="{{ Request::is('company/stations') ? "active" : '' }}">
                <a href="{{ action('CompaniesStationsController@index') }}"><i class="fa fa-map-marker"></i>Stations</a>
            </li>
            <li class="{{ Request::is('company/trips') ? "active" : '' }}">
                <a href="{{ action('CompaniesTripsController@index') }}"><i class="fa fa-car"></i>Trips</a>
            </li>
            <li class="{{ Request::is('company/bookings') ? "active" : '' }}">
                <a href="{{ route('company_bookings') }}"><i class="fa fa-book"></i>Bookings</a>
            </li>
            @if (Auth::travel_company_staff()->get()->type == 1)
                <li class="{{ Request::is('company/settings') ? "active" : '' }}">
                    <a href="{{ route('company_settings') }}"><i class="fa fa-cog"></i>Settings</a>
                </li>
            @endif
        </ul>
    </aside>
</div>