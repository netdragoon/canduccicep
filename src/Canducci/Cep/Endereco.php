<?php

namespace Canducci\Cep;

use Exception;

/**
 * Class Endereco
 * @package Canducci\Cep
 */
class Endereco
{
    /**
     * @var CepRequest|Request
     */
    private $request;

    /**
     * Endereco constructor.
     * @param CepRequest $request
     */
    public function __construct(CepRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $uf
     * @param string $cidade
     * @param string $logradouro
     * @return CepResponse
     * @throws \Exception
     */
    public function find(string $uf, string $cidade, string $logradouro)
    {
        if ($this->valid($uf, $cidade, $logradouro)) {
            $data = $this->request->get($this->url($uf, $cidade, $logradouro));            
            return $this->formatted($data['body'], $data['httpCode']);
        }
        throw new Exception("Informações necessárias: Unidade Federativa 2 letras, Cidade 3 letras no  minimo e Logradouro 3 letras no minimo");
    }

    /**
     * @param string $uf
     * @param string $cidade
     * @param string $logradouro
     * @return bool
     */
    protected function valid(string $uf, string $cidade, string $logradouro): bool
    {
        return (mb_strlen($uf) === 2 && mb_strlen($cidade) >= 3 && mb_strlen($logradouro) >= 3);
    }

    /**
     * @param string $uf
     * @param string $cidade
     * @param string $logradouro
     * @return string
     */
    protected function url(string $uf, string $cidade, string $logradouro): string
    {        
        return "https://viacep.com.br/ws/{$uf}/{$cidade}/{$logradouro}/json/";
    }

    /**
     * @param string $body
     * @param int $httpCode
     * @return EnderecoResponse
     * @throws \Exception
     */
    protected function formatted(string $body, int $httpCode): EnderecoResponse
    {
        $rows = json_decode($body, true);
        $cepModels = array();
        $ok = false;
        if ($httpCode === 200) {
            if (empty($rows['erro'])) {
                $ok = true;
                foreach ($rows as $row) {
                    $cepModel = new CepModel();
                    foreach ($row as $key => $value) {
                        $cepModel->$key = $value;
                    }
                    $cepModels[] = $cepModel;
                }
            }
        }
        return new EnderecoResponse($ok, $cepModels);
    }
}
