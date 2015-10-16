<?php namespace Canducci\Cep;

use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider {
	
    protected $state = false;

    public function register()
    {

        $this->app->bind('Cep', function($app) 
        {

            return new Cep;

        });

    }
    
}
