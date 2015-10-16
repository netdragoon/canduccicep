<?php namespace Canducci\Cep;


class CepInfo {

	private $result;
	private $status;
	private $cep;

	/**
	 * @param $result
	 * @param $status
	 * @param $cep
     */
	public function __construct($result, $status, $cep)
	{

		$this->result = $result;

		$this->status = $status;

		$this->cep = $cep;

	}

	/**
	 * @return bool
     */
	public function passed()
	{

		return !$this->status;
	}

	/**
	 * @return bool
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
