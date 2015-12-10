<?php namespace Canducci\Cep\Contracts;

interface ICep {
    public function find($cep);
    public function setCep($cep);
    public function getCep();
    public function toJson();
    public function toArray();
    public function toObject();
    public function toXml();
    public function toSimpleXml();
    public function toPiped();
    public function toQuerty();
}