<?php

namespace Depsimon\Alerts;

use Illuminate\Support\ServiceProvider;

class AlertsServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind(
            'Depsimon\Alerts\SessionStore',
            'Depsimon\Alerts\LaravelSessionStore'
        );

        $this->app->singleton('alert', function () {
            return $this->app->make('Depsimon\Alerts\AlertsNotifier');
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'alerts');

        $this->publishViews();
        $this->publishComponents();
    }

    protected function publishViews()
    {
        $this->publishes([__DIR__ . '/resources/views' => base_path('resources/views/vendor/alerts')], 'views');
    }

    protected function publishComponents()
    {
        $this->publishes([ __DIR__ . '/resources/assets/js' => base_path('resources/assets/js/vendor/alerts')], 'components');
    }
}