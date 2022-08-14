<?php

namespace App\Providers;

use RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use App\Routing\Contracts\RouteRegistrar;
use Domains\Workflow\Routing\Registrars\TaskRouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

	protected array $registrars = [
        TaskRouteRegistrar::class,
    ];

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    public function map(Registrar $router): void
	{
        $router->middleware('web')->group(base_path('routes/web.php'));
        
		foreach ($this->registrars as $registrar) {
			if (! class_exists($registrar) || ! is_subclass_of($registrar, RouteRegistrar::class)) {
				throw new RuntimeException(sprintf(
					'Cannot map routes \'%s\', it is not a valid routes class',
					$registrar
				));
			}
 
			(new $registrar)->map($router);
		}
	}
}
