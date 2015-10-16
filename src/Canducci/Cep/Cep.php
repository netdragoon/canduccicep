<?php namespace Canducci\Cep;

use \Exception;

class Cep {


    private $cep;

    private $URL =  'http://viacep.com.br/ws/[cep]/[type]/';

    private $loadData = null;

    public function __construct(LoadData $loadData)
    {

        $this->cep = '';

        $this->loadData = $loadData;

    }
    
    public function find($cep)
    {

        self::parse($cep);

        $this->cep = $cep;        

        return $this;
        
    }   

    public function setCep($cep)
    {

        return $this->find($cep);

    }

    public function getCep()
    {

        return $this->cep;

    }

    public function toJson()
    {

        return $this->toReturn('json');

    }

    public function toArray()
    {

        return json_decode($this->toReturn('json'), true);

    }

    public function toObject()
    {        
        return json_decode($this->toReturn('json'), false);
    }

    public function toXml()
    {

        return $this->toReturn('xml');

    }

    public function toSimpleXml()
    {

        return simplexml_load_string($this->toReturn('xml'));

    }

    public function toPiped()
    {

        return $this->toReturn('piped');

    }

    public function toQuerty()
    {

        return $this->toReturn('querty');

    }

    public static function parse($cep)
    {
        
        if (mb_strlen($cep) === 8 && preg_match('/^[0-9]{8}$/', $cep)) return true;

        if (mb_strlen($cep) === 9 && preg_match('/^[0-9]{5}-[0-9]{3}$/', $cep)) return true;

        throw new Exception("Cep com formato inválido. Exemplo: 01414-001 ou 01414001");

    }

    private function validation($get)
    {

        return (!((int)preg_match('/(erro)/', $get) === 1));

    }

    private function renderUrl($type)
    {

         return str_replace(array('[cep]', '[type]'), array($this->cep, $type), $this->URL);

    }

    private function toReturn($type)
    {       

        $get = null;

        $url = $this->renderUrl($type);

        try 
        {
            
            $get = $this->loadData->get($url); 

            if (!$this->validation($get))
            {

                return array('Erro'=> 'Cep não encontrado');
                
            }

        } 
        catch (Exception $ex) 
        {
            
            throw new Exception("Erro no servidor http");

        }  

        return $get;

    }
    
}