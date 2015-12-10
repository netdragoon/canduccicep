<?php namespace Canducci\Cep\Contracts;

interface ICep {
    /**
     * @param $cep
     * @return mixed
     */
    public function find($cep);

    /**
     * @param $cep
     * @return mixed
     */
    public function setCep($cep);

    /**
     * @return mixed
     */
    public function getCep();

    /**
     * @return mixed
     */
    public function toJson();

    /**
     * @return mixed
     */
    public function toArray();

    /**
     * @return mixed
     */
    public function toObject();

    /**
     * @return mixed
     */
    public function toXml();

    /**
     * @return mixed
     */
    public function toSimpleXml();

    /**
     * @return mixed
     */
    public function toPiped();

    /**
     * @return mixed
     */
    public function toQuerty();
}