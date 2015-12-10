<?php namespace Canducci\Cep\Providers;

use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider {
	
    protected $state = false;

    public function register()
    {

        $this->app->singleton('CepClient', function()
        {

            return new Canducci\Cep\CepClient();

        });

        $this->app->bind('Cep', function($app)
        {

            return new Canducci\Cep\Cep($app['CepClient']);

        });

    }

}
