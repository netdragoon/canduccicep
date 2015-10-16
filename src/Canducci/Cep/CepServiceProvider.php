<?php namespace Canducci\Cep;

use Illuminate\Support\ServiceProvider;


class CepServiceProvider extends ServiceProvider {
	
    protected $state = false;

    /**
     * register class LoadData and Cep
     */
    public function register()
    {

    	$this->app->singleton('LoadData', function($app)
    	{

    		return new LoadData();

   		});

        $this->app->bind('Cep', function($app) 
        {

            return new Cep($app['LoadData']);

        });

    }

}
