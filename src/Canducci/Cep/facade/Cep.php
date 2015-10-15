<?php 
namespace Canducci\Cep\Facade;

use Illuminate\Support\Facades\Facade;

class Cep extends Facade 
{

	protected static function getFacadeAccessor() 
	{ 

		return 'Cep';
		
	}		

}