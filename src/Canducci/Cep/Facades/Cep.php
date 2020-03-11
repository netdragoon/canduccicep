<?php namespace Canducci\Cep\Facades;

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