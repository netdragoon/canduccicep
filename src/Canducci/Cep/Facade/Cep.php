<?php namespace Canducci\Cep\Facade;

use Illuminate\Support\Facades\Facade;

class Cep extends Facade {

	/**
	 * @return string
     */
	protected static function getFacadeAccessor()
	{ 

		return 'Cep';
		
	}		

}