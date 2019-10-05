<?php
namespace PersonalityCore;

use Personality\Http\Middleware\CheckIfActive;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->middleware('isActive', CheckIfActive::class);
    }
}