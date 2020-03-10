<?php namespace Canducci\Cep;

/**
 * Class Endereco
 * @package Canducci\Cep
 */
class Endereco
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Endereco constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
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
        $data = $this->request->get($this->url($uf, $cidade, $logradouro));
        return $this->formatted($data['body'], $data['httpCode']);
    }

    /**
     * @param string $uf
     * @param string $cidade
     * @param string $logradouro
     * @return string
     */
    protected function url(string $uf, string $cidade, string $logradouro): string
    {
        return "http://viacep.com.br/ws/{$uf}/{$cidade}/{$logradouro}/json/";
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
                foreach ($rows as $row)
                {
                    $cepModel = new CepModel();
                    foreach ($row as $key => $value)
                    {
                        $cepModel->$key = $value;
                    }
                    $cepModels[] = $cepModel;
                }
            }
        }
        return new EnderecoResponse($ok, $cepModels);
    }
}