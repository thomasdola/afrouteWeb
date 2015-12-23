<div class="col-md-3">
    <aside class="user-profile-sidebar">
    {{-- {{ dd(Auth::staff()->get()->role->id) }} --}}
        <ul class="list user-profile-nav">
            <li class="{{ Request::is('admin/dashboard') ? "active" : '' }}">
                <a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            @if (Auth::staff()->get()->role->id == 1)
                <li class="{{ Request::is('admin/staffs') ? "active" : '' }}">
                    <a href="{{ action('UsersController@index') }}"><i class="fa fa-user"></i>Staffs</a>
                </li>
            @endif
            <li class="{{ Request::is('admin/travel-companies') ? "active" : '' }}">
                <a href="{{ action('TravelCompaniesController@index') }}"><i class="im im-bus"></i>Travel Companies</a>
            </li>
            @if (Auth::staff()->get()->role->id == 3 OR Auth::staff()->get()->role->id == 1)
                <li class="{{ Request::is('admin/accounting') ? "active" : '' }}">
                    <a href="{{ action('AccountingController@index') }}"><i class="fa fa-money"></i>Accounting</a>
                </li>
            @endif
            @if (Auth::staff()->get()->role->id == 1 OR Auth::staff()->get()->role->id  == 2)
                <li class="{{ Request::is('admin/general-reports') ? "active" : '' }}">
                    <a href="{{ action('AdminReportsController@index') }}"><i class="fa fa-book"></i>General Reports</a>
                </li>
                <li class="{{ Request::is('admin/booking-reports') ? "active" : '' }}">
                    <a href="{{ action('AdminReportsController@booking_reports_index') }}"><i class="fa fa-book"></i>Booking Reports</a>
                </li>
            @endif
            @if (Auth::staff()->get()->role->id == 1)
                <li class="{{ Request::is('admin/settings') ? "active" : '' }}">
                    <a href="{{ action('AdminSettingsController@index') }}"><i class="fa fa-cog"></i>Settings</a>
                </li>
            @endif
            {{-- <li class="{{ Request::is('admin/articles') ? "active" : '' }}">
                <a href="{{ action('ArticlesController@index') }}"><i class="fa fa-pencil"></i>Press Center</a>
            </li> --}}
            <li class="{{ Request::is('admin/buses') ? "active" : '' }}">
                <a href="{{ action('BusesController@index') }}"><i class="im im-bus"></i> Bus Rental</a>
            </li>
            <li class="{{ Request::is('admin/rental-requests') ? "active" : '' }}">
                <a href="{{ action('RentalsController@index') }}"><i class="im im-meet"></i> Bus Rental Requests</a>
            </li>
            <li class="{{ Request::is('admin/change-password') ? "active" : '' }}">
                <a href="{{ action('AdminSettingsController@getChangePassword') }}"><i class="fa fa-lock"></i> Change Password</a>
            </li>
        </ul>
    </aside>
</div>