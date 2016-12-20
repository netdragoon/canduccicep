<?php namespace Canducci\Cep;

use Canducci\Cep\Contracts\IEnderecoInfo;

class EnderecoInfo implements IEnderecoInfo
{
    private $result;

    private $status;

    /**
     * EnderecoInfo constructor.
     * @param $result
     * @param $status
     */
    public function __construct($result, $status)
    {
        $this->result = $result;

        $this->status = $status;

    }

    /**
     * @return mixed
     */
    public function passed()
    {

        return !$this->status;

    }

    /**
     * @return mixed
     */
    public function isError()
    {

        return $this->status;

    }

    /**
     * @return mixed
     */
    public function result()
    {

        return $this->result;

    }
}