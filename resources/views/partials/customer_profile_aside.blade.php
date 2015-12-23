<div class="col-md-3">
    <aside class="user-profile-sidebar">
        <div class="user-profile-avatar text-center">
            {{-- <img src="img/300x300.png" alt="Image Alternative text" title="AMaze" /> --}}
            <h5>{{ Auth::user()->get()->name }}</h5>
            <p>Member Since {{ Auth::user()->get()->created_at->toFormattedDateString() }}</p>
        </div>
        <ul class="list user-profile-nav">
            <li class="{{ Request::is('my-profile') ? "active" : '' }}">
                <a href="{{ route('customer_profile') }}"><i class="fa fa-user"></i>Overview</a>
            </li>
            <li class="{{ Request::is('my-settings') ? "active" : '' }}">
                <a href="{{ route('customer_settings') }}"><i class="fa fa-cog"></i>Settings</a>
            </li>
            <li class="{{ Request::is('my-booking-history') ? "active" : '' }}">
                <a href="{{ route('customer_booking_history') }}"><i class="fa fa-clock-o"></i>Booking History</a>
            </li>
            <li class="{{ Request::is('cash-card-vending-point') ? "active" : '' }}">
                <a href="{{ route('outlets') }}"><i class="fa fa-credit-card"></i>CashCard Outlets</a>
            </li>
        </ul>
    </aside>
</div>