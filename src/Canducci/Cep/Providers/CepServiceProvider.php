<?php namespace Canducci\Cep\Providers;

use Canducci\Cep\Cep;
use Canducci\Cep\CepRequest;
use Canducci\Cep\Endereco;
use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('CepRequest', function()
        {
            return new CepRequest();
        });

        $this->app->singleton('Cep', function($app)
        {
            return new Cep($app['CepRequest']);
        });

        $this->app->singleton('Endereco', function($app)
        {
            return new Endereco($app['CepRequest']);
        });
    }
}