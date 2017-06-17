<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAuthRoutes();
        $this->mapAdminRoutes();
        $this->mapStudentRoutes();
        $this->mapEvaluatorRoutes();
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
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }

    /**
     * Rutas de Administrador
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'role:admin'])
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapStudentRoutes()
    {
        Route::prefix('student')
            ->middleware(['web', 'auth', 'role:student'])
            ->namespace($this->namespace . '\Student')
            ->group(base_path('routes/student.php'));
    }

    protected function mapEvaluatorRoutes()
    {
         Route::prefix('evaluator')
            ->middleware(['web', 'auth', 'role:evaluator'])
            ->namespace($this->namespace . '\Evaluator')
            ->group(base_path('routes/evaluator.php'));
    }
}
