<?php namespace Canducci\Cep;

use Canducci\Cep\Contracts\IEndereco;
use Exception;

class Endereco implements IEndereco
{

    private $URL =  'http://viacep.com.br/ws/[UF]/[CIDADE]/[LOGRADOURO]/json/';

    private $cepClient;

    private $uf;
    private $cidade;
    private $logradouro;

    /**
     * Endereco constructor.
     * @param CepClient $cepClient
     */
    public function __construct(CepClient $cepClient)
    {

        $this->cepClient = $cepClient;

    }


    /**
     * @param $uf
     * @param $cidade
     * @param $logradouro
     * @return mixed
     */
    public function find($uf, $cidade, $logradouro)
    {
        self::parse($uf, $cidade, $logradouro);

        $this->uf = $uf;

        $this->cidade = $cidade;

        $this->logradouro = $logradouro;

    }

    /**
     * @param $uf
     * @param $cidade
     * @param $logradouro
     * @return bool
     * @throws Exception
     */
    public static function parse($uf, $cidade, $logradouro)
    {
        if (mb_strlen($uf) === 2 &&
            mb_strlen($cidade) >= 3 &&
            mb_strlen($logradouro) >= 3) {
            return true;
        }

        throw new Exception("Informações necessárias\rUnidade Federativa 2 letras\rCidade 3 letras no  minimo\rLogradouro 3 letras no minimo");

    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        return $this->get_result('array');
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function toJson()
    {
        return $this->get_result('json');
    }

    /**
     * @return mixed
     */
    private function renderUrl()
    {

        $search = array('[UF]','[CIDADE]','[LOGRADOURO]');

        $replace = array($this->uf, $this->cidade, $this->logradouro);

        return str_replace($search, $replace, $this->URL);

    }

    /**
     * @param string $type
     * @return EnderecoInfo
     * @throws Exception
     */
    private function get_result($type = "json")
    {
        $get = null;

        $url = $this->renderUrl();

        try
        {

            $get = $this->get_result($url);

            return $type === "json"
                ? new EnderecoInfo($get, !is_null($get))
                : new EnderecoInfo(json_decode($get, true), !is_null($get));

        }
        catch (Exception $ex)
        {

            throw new Exception("Erro no servidor http");

        }

    }
}