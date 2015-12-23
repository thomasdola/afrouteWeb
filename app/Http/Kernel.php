<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'user-auth' => \App\Http\Middleware\Authenticate::class,
        'admin-auth' => \App\Http\Middleware\AuthenticateStaff::class,
        'company-auth' => \App\Http\Middleware\AuthenticateCompany::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'user-guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'company-guest' => \App\Http\Middleware\RedirectCompanyIfAuthenticated::class,
        'admin-guest' => \App\Http\Middleware\RedirectStaffIfAuthenticated::class,
        'check-if-admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'check-if-company_staff' => \App\Http\Middleware\RedirectIfNotCompanyStaff::class,
        'check-if-user' => \App\Http\Middleware\RedirectIfNotUser::class,
	    'trip-avail' => \App\Http\Middleware\TripAvailability::class,
	    'AdminCheck' => \App\Http\Middleware\AdminCheck::class,
	    'AccountCheck' => \App\Http\Middleware\AccountantCheck::class,
	    'SuperAdminCheck' => \App\Http\Middleware\SuperAdminCheck::class,
	    'CompanyAdminCheck' => \App\Http\Middleware\CompanyAdminCheck::class,
    ];
}
