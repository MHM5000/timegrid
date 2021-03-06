<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Business;
use App\Models\Contact;
use App\Models\Domain;
use App\Models\Service;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

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
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->model('contact', Contact::class);
        $router->model('service', Service::class);
        $router->model('appointment', Appointment::class);
        $router->bind('business', function ($businessSlug) {
            return Business::where('slug', $businessSlug)->first();
        });
        $router->bind('domain', function ($domainSlug) {
            return Domain::where('slug', $domainSlug)->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
