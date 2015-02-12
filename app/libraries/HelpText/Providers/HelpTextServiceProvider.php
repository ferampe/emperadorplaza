<?php
namespace libraries\HelpText\Providers;
use Illuminate\Support\ServiceProvider;
use libraries\HelpText\Services\HelpText;

class HelpTextServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['helptext'] = $this->app->share(function ($app) {
            return new HelpText();
        });
    }
}
