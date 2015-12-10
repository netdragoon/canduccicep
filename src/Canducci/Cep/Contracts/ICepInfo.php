<?php namespace Canducci\Cep\Contracts;

interface ICepInfo {
    public function passed();
    public function isError();
    public function result();
}