<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	/*Auth routes*/

	//Admin
	Route::get('logout', ['as'=>'logout', 'uses'=>'AppUserAuthenticationController@getLogout']);
	Route::get('staffLogout', ['as'=>'staffLogout', 'uses'=>'AppAdminAuthenticationController@getStaffLogout']);
	Route::get('companyLogout', ['as'=>'companyLogout', 'uses'=>'AppCompanyStaffAuthenticationController@getCompanyLogout']);

	//Customers
	Route::get('/auth/login', ['as'=>'login', 'uses'=>'AppUserAuthenticationController@getUserLogin']);
	Route::post('/auth/login', ['as'=>'login', 'uses'=>'AppUserAuthenticationController@postUserLogin']);
	Route::post('/auth/sign-up', ['as'=>'register', 'uses'=>'AppUserAuthenticationController@registerUser']);
	Route::get('/auth/register/verify/{confirmation_code}', ['as'=>'confirmation_path', 'uses'=>'AppUserAuthenticationController@confirm']);
	Route::get('/auth/login/{provider?}', 'AppAuthController@socialLogin');

	//Travel Companies
	Route::get('company/auth/login', ['as'=>'company_login', 'uses'=>'AppCompanyStaffAuthenticationController@getCompanyLogin']);
	Route::post('company/auth/login', ['as'=>'company_login', 'uses'=>'AppCompanyStaffAuthenticationController@postCompanyLogin']);

	Route::get('admin/auth/login', ['as'=>'staff_login', 'uses'=>'AppAdminAuthenticationController@getStaffLogin']);
	Route::post('admin/auth/login', ['as'=>'staff_login', 'uses'=>'AppAdminAuthenticationController@postStaffLogin']);



	//Pages routes

	Route::get('/', ['as'=>'welcome', 'uses'=>'PagesController@welcome']);
	Route::get('soon', ['as'=>'soon', 'uses'=>'PagesController@soon']);
	Route::post('/support', ['as'=>'support', 'uses'=>'PagesController@sendFeedback']);
	Route::get('/about', ['as'=>'about_us', 'uses'=>'PagesController@about_us']);
	Route::get('contact', ['as'=>'contact_us', 'uses'=>'PagesController@contact_us']);
	Route::get('/ticket', ['as'=>'soon', 'uses'=>'PagesController@ticketDownload']);
	Route::get('/search', ['as'=>'search', 'uses'=>'PagesController@search']);
	Route::get('/filter', ['as'=>'filter', 'uses'=>'PagesController@filter']);
	Route::get('/receipt', ['as'=>'receipt', 'uses'=>'PagesController@receipt']);
	Route::get('/cash-card-vending-point', ['as'=>'outlets', 'uses'=>'PagesController@cvp']);
	Route::get('/rent-bus', ['as'=>'all_buses', 'uses'=>'PagesController@allBuses']);
	Route::get('/rent-bus/{id}', ['as'=>'rent_bus', 'uses'=>'PagesController@rentBus']);
	Route::post('rental-save', ['as'=>'rental_save', 'uses'=>'RentalsController@create']);
	Route::get('rental-feedback', ['as'=>'rental_feedback', 'uses'=>'RentalsController@rental_feedback']);


	Route::group(['middleware'=>['user-auth']], function()
	{
		Route::get('trips/{id}', ['as'=>'booking', 'uses'=>'BookingsController@first']);
		Route::post('trips/{id}', ['as'=>'checking', 'uses'=>'BookingsController@second']);
	});


	//Pages Simple

	Route::get('stations', ['as'=>'all_stations', 'uses'=>'PagesController@all_stations']);
	Route::get('posts', ['as'=>'posts', 'uses'=>'PagesController@posts']);
	Route::get('posts/{slug}', ['as'=>'post', 'uses'=>'PagesController@post']);
	Route::get('privacy-policies', ['as'=>'policy', 'uses'=>'PagesController@policy']);
	Route::get('terms', ['as'=>'terms', 'uses'=>'PagesController@terms']);
	Route::get('faqs', ['as'=>'faq', 'uses'=>'PagesController@faq']);
	Route::get('check-result', ['as'=>'check_result', 'uses'=>'PagesController@check_result']);



	//Payments routes

	Route::group(['prefix'=>'payment', 'middleware'=>'user-auth'],
		function()
			{
				Route::get('registered', ['as'=>'payment_for_registered_user', 'uses'=>'PaymentsController@registered']);
				Route::get('trip-booked', ['as'=>'success', 'uses'=>'PaymentsController@success']);
				Route::get('trip-reserved', ['as'=>'trip-reserved', 'uses'=>'PaymentsController@reservation']);
				Route::get('reserved-trip-paid', ['as'=>'reserved-trip-paid', 'uses'=>'PaymentsController@reservation_paid']);
			}
		);

	//Travel Companies routes

	Route::get('companies', ['as'=>'all_companies', 'uses'=>'CompaniesController@all']);
	Route::get('companies/{slug}', ['as'=>'single', 'uses'=>'CompaniesController@single']);

	Route::group(['prefix'=>'company', 'middleware'=>['check-if-company_staff','company-auth']], function()
	{
		Route::get('dashboard', ['as'=>'company_dashboard', 'uses'=>'CompaniesController@dashboard']);
		Route::get('bookings', ['as'=>'company_bookings', 'uses'=>'CompaniesController@bookings']);
		Route::get('filter-bookings', ['as'=>'filter_bookings', 'uses'=>'CompaniesController@filter_bookings']);
		Route::get('settings', ['as'=>'company_settings', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@settings']);
		Route::post('settings', ['as'=>'add_company_staff', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@add_staff']);
		Route::patch('change_company_password', ['as'=>'change_company_password', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@password_change']);
		Route::patch('settings', ['as'=>'company_profile_update', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@profile_update']);
		Route::resource('stations', 'CompaniesStationsController');
		Route::resource('trips', 'CompaniesTripsController');
		Route::post('settings/logo', ['as'=>'company_logo_upload', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@profile_logo']);
		Route::post('settings/image', ['as'=>'company_image_upload', 'middleware'=>'CompanyAdminCheck', 'uses'=>'CompaniesController@profile_image']);
	});


	//Customers routes

	Route::group(['middleware'=>'user-auth'], function()
	{
		Route::get('my-profile', ['as'=>'customer_profile', 'uses'=>'CustomersController@profile']);
		Route::get('my-account', ['as'=>'customer_account', 'uses'=>'CustomersController@account']);
		Route::get('my-settings', ['as'=>'customer_settings', 'uses'=>'CustomersController@account_settings']);
		Route::post('my-settings', ['as'=>'customer_settings-info', 'uses'=>'CustomersController@info_update']);
		Route::post('customer_password_change', ['as'=>'customer_settings_password', 'uses'=>'CustomersController@password_change']);
		Route::get('my-booking-history', ['as'=>'customer_booking_history', 'uses'=>'CustomersController@booking_history']);
		Route::delete('remove-booking', ['as'=>'booking-remove', 'uses'=>'CustomersController@put_booking_in_trash']);
		Route::get('pay-now/{code}', ['as'=>'pay_reserve_booking_form', 'uses'=>'CustomersController@pay_reserve_booking_form']);
		Route::patch('pay-now', ['as'=>'pay_reserve_booking', 'uses'=>'CustomersController@pay_reserve_booking_now']);
		Route::patch('my-booking', ['as'=>'cancel_paid_booking', 'uses'=>'CustomersController@cancel_paid_booking']);
		Route::post('post-review', ['as'=>'post-review', 'uses'=>'CustomersController@post_review']);
		Route::get('ticket-download/{code}', ['as'=>'ticketing', 'uses'=>'CustomersController@ticketing']);
	});


	//Admin routes

	Route::group(['prefix'=>'admin', 'middleware'=>[ 'check-if-admin', 'admin-auth']], function()
	{
		Route::get('/dashboard', ['as'=>'admin', 'uses'=>'AdminController@index']);
		Route::get('settings', ['as'=>'settings', 'middleware'=>'SuperAdminCheck', 'uses'=>'AdminSettingsController@index']);
		Route::get('change-password', ['as'=>'get_change_password', 'middleware'=>'SuperAdminCheck',
			'uses'=>'AdminSettingsController@getChangePassword']);
		Route::patch('change-password', ['as'=>'change_password', 'middleware'=>'SuperAdminCheck',
			'uses'=>'AdminSettingsController@change_password']);
		Route::get('accounting', ['as'=>'admin_account', 'middleware'=>'AccountCheck', 'uses'=>'AccountingController@index']);
		Route::get('accounting/{slug}', ['as'=>'one_account', 'uses'=>'AccountingController@single']);
		Route::get('general-reports', ['as'=>'admin_general_reports','middleware'=>'AdminCheck', 'uses'=>'AdminReportsController@index']);
		Route::get('booking-reports', ['as'=>'admin_booking_reports','middleware'=>'AdminCheck', 'uses'=>'AdminReportsController@booking_reports_index']);
		Route::get('booking-reports-generate', ['as'=>'get_admin_booking_reports','middleware'=>'AdminCheck', 'uses'=>'AdminReportsController@booking_reports_to_generate']);
		Route::post('general-reports-generate', ['as'=>'general-generate_reports','middleware'=>'AdminCheck', 'uses'=>'AdminReportsController@general_report_generate']);
		Route::post('booking-reports-generate', ['as'=>'booking-generate_reports','middleware'=>'AdminCheck', 'uses'=>'AdminReportsController@booking_report_generate']);
		Route::resource('travel-companies', 'TravelCompaniesController');
		Route::resource('staffs', 'UsersController');
		Route::post('faqs', 'FaqsController@store');
		Route::patch('faqs/{id}', 'FaqsController@update');
		Route::post('access-level', 'RolesController@store');
		Route::delete('access-level/{id}', 'RolesController@delete');
		Route::post('travel-company-staff-access-level', 'TravelCompanyStaffRolesController@store');
		Route::delete('travel-company-staff-access-level/{id}', 'TravelCompanyStaffRolesController@delete');
		Route::post('Outlets', 'OutletsController@store');
		Route::delete('Outlets/{id}', 'OutletsController@delete');
		Route::get('CashCard', ['as'=>'cash_card', 'middleware'=>'SuperAdminCheck', 'uses'=>'CashCardController@generate']);
		Route::resource('articles', 'ArticlesController');
		Route::get('buses', ['as'=>'bus_rental_index', 'uses'=>'BusesController@index']);
		Route::get('buses/create', ['as'=>'bus_rental_add_bus', 'uses'=>'BusesController@addBus']);
		Route::post('buses/create', ['as'=>'bus_rental_save_bus', 'uses'=>'BusesController@saveBus']);
		Route::get('buses/{id}/edit', ['as'=>'bus_rental_edit_bus', 'uses'=>'BusesController@editBus']);
		Route::put('buses/{id}/edit', ['as'=>'bus_rental_update_bus', 'uses'=>'BusesController@updateBus']);
		Route::delete('buses/{id}', ['as'=>'bus_rental_delete_bus', 'uses'=>'BusesController@deleteBus']);
		Route::get('rental-requests', ['as'=>'bus_request', 'uses'=>'RentalsController@index']);
		Route::get('rental-requests/{id}', ['as'=>'rental_view', 'uses'=>'RentalsController@show']);

	});


