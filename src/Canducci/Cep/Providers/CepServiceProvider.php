<?php namespace Canducci\Cep\Providers;

use Illuminate\Support\ServiceProvider;
use Canducci\Cep\CepClient;
use Canducci\Cep\Cep;

class CepServiceProvider extends ServiceProvider {
	
    protected $state = false;

    public function register()
    {

        $this->app->singleton('CepClient', function()
        {

            return new CepClient();

        });

        $this->app->singleton('Canducci\Cep\Contracts\ICepClient', function($app)
        {

            return $app['CepClient'];

        });

        $this->app->singleton('Cep', function($app)
        {

            return new Cep($app['CepClient']);

        });

        $this->app->singleton('Canducci\Cep\Contracts\ICep', function($app)
        {

            return $app['Cep'];

        });

    }

}
