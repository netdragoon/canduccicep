<?php namespace Canducci\Cep;

use \Exception;

class Cep {


    private $cep;

    private $URL =  'http://viacep.com.br/ws/[cep]/[type]/';

    private $loadData = null;

    /**
     * @param LoadData $loadData
     */
    public function __construct(LoadData $loadData)
    {

        $this->cep = '';

        $this->loadData = $loadData;

    }

    /**
     * @param $cep
     * @return $this
     * @throws Exception
     */
    public function find($cep)
    {

        self::parse($cep);

        $this->cep = $cep;        

        return $this;
        
    }

    /**
     * @param $cep
     * @return Cep
     */
    public function setCep($cep)
    {

        return $this->find($cep);

    }

    /**
     * @return string
     */
    public function getCep()
    {

        return $this->cep;

    }

    /**
     * @return CepInfo
     * @throws Exception
     */
    public function toJson()
    {
        
        $data = $this->toReturn('json');
        
        if (!$data[1]) return $this->renderCepInfoNull();
        
        return $this->renderCepInfo($data[0], false, $this->getCep());

    }

    /**
     * @return CepInfo
     */
    public function toArray()
    {

        return $this->toArrayOrObject(true);                

    }

    /**
     * @return CepInfo
     */
    public function toObject()
    {        

        return $this->toArrayOrObject(false);                

    }

    /**
     * @return CepInfo
     * @throws Exception
     */
    public function toXml()
    {

        $data = $this->toReturn('xml');
        
        if (!$data[1]) return $this->renderCepInfoNull();

        return $this->renderCepInfo($data[0], false, $this->getCep());

    }

    /**
     * @return CepInfo
     * @throws Exception
     */
    public function toSimpleXml()
    {

        $data = $this->toReturn('xml');
        
        if (!$data[1]) return $this->renderCepInfoNull();

        return $this->renderCepInfo(simplexml_load_string($data[0]), false, $this->getCep());

    }

    /**
     * @return CepInfo
     * @throws Exception
     */
    public function toPiped()
    {

        $data = $this->toReturn('piped');
        
        if (!$data[1]) return $this->renderCepInfoNull();

        return $this->renderCepInfo($data[0], false, $this->getCep());        

    }

    /**
     * @return CepInfo
     * @throws Exception
     */
    public function toQuerty()
    {

        $data = $this->toReturn('querty');
        
        if (!$data[1]) return $this->renderCepInfoNull();
        
        return $this->renderCepInfo($data[0], false, $this->getCep());                

    }

    /**
     * @param $cep
     * @return bool
     * @throws Exception
     */
    public static function parse($cep)
    {
        
        if (mb_strlen($cep) === 8 && preg_match('/^[0-9]{8}$/', $cep)) return true;

        if (mb_strlen($cep) === 9 && preg_match('/^[0-9]{5}-[0-9]{3}$/', $cep)) return true;

        throw new Exception("Cep com formato inválido. Exemplo: 01414-001 ou 01414001");

    }

    /**
     * @param $get
     * @return bool
     */
    private function validation($get)
    {

        return !((int)preg_match('/(erro)/', $get) === 1);

    }

    /**
     * @param $type
     * @return mixed
     */
    private function renderUrl($type)
    {

         return str_replace(array('[cep]', '[type]'), array($this->cep, $type), $this->URL);

    }

    /**
     * @param $type
     * @return array|mixed|null
     * @throws Exception
     */
    private function toReturn($type)
    {       

        $get = null;

        $url = $this->renderUrl($type);

        try 
        {
            
            $get = $this->loadData->get($url); 
            
            return array($get, $this->validation($get));

        } 
        catch (Exception $ex) 
        {
            
            throw new Exception("Erro no servidor http");

        }  

        return $get;

    }

    /**
     * @param $result
     * @param $status
     * @param $cep
     * @return CepInfo
     */
    private function renderCepInfo($result, $status, $cep)
    {

        return new CepInfo($result, $status, $cep);
        
    }

    /**
     * @return CepInfo
     */
    private function renderCepInfoNull()
    {

        return $this->renderCepInfo(null, true, $this->getCep());

    }

    /**
     * @param bool $st
     * @return CepInfo
     * @throws Exception
     */
    private function toArrayOrObject($st = true)
    {

        $data = $this->toReturn('json');
        
        if (!$data[1]) return $this->renderCepInfoNull();

        return $this->renderCepInfo(json_decode($data[0], $st), false, $this->getCep());

    }
}