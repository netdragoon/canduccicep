<?php namespace Canducci\Cep;

use \Exception;

class CepInfo {

	private $result;
	private $status;
	private $cep;

	public function __construct($result, $status, $cep)
	{

		$this->result = $result;

		$this->status = $status;

		$this->cep = $cep;

	}
	public function passed()
	{

		return !$this->status;
	}

	public function isError()
	{

		return $this->status;

	}

	public function result()
	{

		return $this->result;

	}
}
