<?php namespace Canducci\Cep\Providers;

use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider {
	
    protected $state = false;
    public function register()
    {

        $this->app->singleton('LoadData', function()
        {
            return new LoadData();
        });

        $this->app->bind('Cep', function($app)
        {
            return new Cep($app['LoadData']);
        });

    }

}
