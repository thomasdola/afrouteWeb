<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
	    $router->model('staffs', 'App\Staff');
	    $router->model('stations', 'App\Station');
	    $router->model('travel_companies', 'App\TravelCompany');
	    $router->model('roles', 'App\Role');
	    $router->model('outlets', 'App\Outlet');
	    $router->model('faqs', 'App\Faq');
	    $router->model('users', 'App\User');
	    $router->model('bookings', 'App\Booking');
	    $router->model('trips', 'App\Trip');
	    $router->model('articles', 'App\Article');
	    $router->model('stations', 'App\Station');
	    $router->model('travel_company_staff_roles', 'App\TravelCompanyRole');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
