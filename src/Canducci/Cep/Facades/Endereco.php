<?php namespace Canducci\Cep\Facades;

use Illuminate\Support\Facades\Facade;

class Endereco extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Endereco';
    }
}