<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Request $request)
    {
         $locale = $request->segment(1);

        //jika yang diakses /backendroute atau /api
        if(in_array($locale,config('app.skip_locales'))) {
            app()->setLocale('en');
            //$this->skipLocaleRoutes();
            $this->mapWebRoutes();
            $this->mapApiRoutes();
        //mengakses default locale
        }elseif(!array_key_exists($locale, config('app.locales')) || $locale==config('app.locale') ){
            app()->setLocale('id');
            $this->mapWebRoutes();
            //$this->skipLocaleRoutes();
        //mengakses locale selain default
        }else {
            $this->localeRoutes($locale);
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Add a locale prefix to routes  
     * @param  \Illuminate\Routing\Router $router $router 
     * @param  string $locale 
     * @return void
     */
    private function localeRoutes($locale)
    {
        app()->setLocale($locale);
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
            'prefix' => $locale
        ], function ($router) {
            require base_path('routes/web.php');
        });

        // Route::group(['namespace' => $this->namespace, 'prefix' => $locale], function($router) {
        //     require app_path('Http/routes.php');
        // });
               
    }

    /**
     * Map routes without locale prefix
     * @param  \Illuminate\Routing\Router $router 
     * @return void
     */
    private function skipLocaleRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });

        // Route::group(['namespace' => $this->namespace], function ($router) {
        //     require app_path('Http/routes.php');
        // });
    }
}
