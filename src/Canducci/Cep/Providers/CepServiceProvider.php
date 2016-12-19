<?php namespace Canducci\Cep\Providers;

use Canducci\Cep\Cep;
use Canducci\Cep\CepClient;
use Canducci\Cep\Endereco;
use Illuminate\Support\ServiceProvider;

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

        $this->app->singleton('Endereco', function($app)
        {

            return new Endereco($app['CepClient']);

        });


        $this->app->singleton('Canducci\Cep\Contracts\IEndereco', function ($app)
        {

            return $app['Endereco'];

        });

    }

}
