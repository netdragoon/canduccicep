<?php namespace Canducci\Cep\Contracts;

interface ICepInfo {

    /**
     * @return mixed
     */
    public function passed();

    /**
     * @return mixed
     */
    public function isError();

    /**
     * @return mixed
     */
    public function result();

}