<?php namespace Canducci\Cep\Providers;

use Canducci\Cep\Cep;
use Canducci\Cep\Endereco;
use Canducci\Cep\Request;
use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('Request', function()
        {
            return new Request();
        });

        $this->app->singleton('Cep', function($app)
        {
            return new Cep($app['Request']);
        });

        $this->app->singleton('Endereco', function($app)
        {
            return new Endereco($app['Request']);
        });
    }
}