# CANDUCCI CEP

__Web Service http://viacep.com.br/__

[![Canducci Cep](http://i666.photobucket.com/albums/vv25/netdragoon/cep_zpsoqtae5hr.png)](https://packagist.org/packages/canducci/cep)

[![Build Status](https://travis-ci.org/netdragoon/canduccicep.svg?branch=master)](https://travis-ci.org/netdragoon/cep)
[![Packagist](https://img.shields.io/packagist/dt/canducci/cep.svg?style=flat)](https://packagist.org/packages/canducci/cep)
[![Packagist](https://img.shields.io/packagist/l/canducci/cep.svg)](https://packagist.org/packages/canducci/cep)
[![Packagist](https://img.shields.io/packagist/v/canducci/cep.svg?label=version)](https://packagist.org/packages/canducci/cep)

### Demo

[Demo Canducci CEP](http://zipcodedemo.herokuapp.com/)

### Configurações

Na chave `require` do `composer.json` adicione a linhas abaixo conforme versão:

___Versão 1.*___

```PHP
"canducci/cep": "1.0.*" 

```

___Versão 2.*___
```PHP
"canducci/cep": "2.0.*"

```

Na linha de comando execute:

    $ composer update

No `config/app.php` em `providers` adicione conforme versão:

___Versão 1.*___
```PHP
'providers' => array(
    ...,
    'Illuminate\Workbench\WorkbenchServiceProvider',
    'Canducci\Cep\CepServiceProvider',    

),
```
___Versão 2.*___
```PHP
'providers' => array(
    ...,
    'Illuminate\Workbench\WorkbenchServiceProvider',    
    'Canducci\Cep\Providers\CepServiceProvider'

),
```

No final do arquivo `config/app.php` adicione o `aliases` (Facade):

___Versão 1.*___

```PHP
'aliases' => array(
    ...,
    'View'       => 'Illuminate\Support\Facades\View',
    'Cep'        => 'Canducci\Cep\Facade\Cep',
),
```

___Versão 2.*___

```PHP
'aliases' => array(
    ...,
    'View'       => 'Illuminate\Support\Facades\View',    
    'Cep'        => 'Canducci\Cep\Facades\Cep',

),
```

##Como usar?

Para usar é muito simples, passe o CEP e chamar os diversos tipos de saída:

####Facade (version 1.* e 2.*)

```PHP
$cep = Cep::find('01414-001');

```

####Application (version 1.* e 2.*)

```PHP
$cep = app('Cep')->find('01414-001');

```

####Injection (version 2.*)

```PHP
Route::get("cep", function(Canducci\Cep\Contracts\ICep $c)
{    
    $cep = $c->find('01414-001');
});

```

####Function (version 2.*)

```PHP 
$cep = cep('01414-001');

```

###Tipos retornados:

```PHP    
$cepInfo = $cep->toJson();

$cepInfo->result();

    {
        "cep": "01414-001",
        "logradouro": "Rua Haddock Lobo",
        "bairro": "Cerqueira César",
        "localidade": "São Paulo",
        "uf": "SP",
        "ibge": "3550308"
    }
    
```

```PHP    
$cepInfo = $cep->toArray();

$cepInfo->result();

    Array
    (
        [cep] => 01414-001
        [logradouro] => Rua Haddock Lobo
        [bairro] => Cerqueira César
        [localidade] => São Paulo
        [uf] => SP
        [ibge] => 3550308
    )
    
```

```PHP    
$cepInfo = $cep->toObject();
    
$cepInfo->result();
    
    stdClass Object
    (
        [cep] => 01414-001
        [logradouro] => Rua Haddock Lobo
        [bairro] => Cerqueira César
        [localidade] => São Paulo
        [uf] => SP
        [ibge] => 3550308
    )
    
```

```PHP    
$cepInfo = $cep->toXml();

$cepInfo->result();
    
    <?xml version="1.0" encoding="utf-8"?>
    <xmlcep>
    	<cep>01414-001</cep>
    	<logradouro>Rua Haddock Lobo</logradouro>
    	<bairro>Cerqueira César</bairro>
    	<localidade>São Paulo</localidade>
    	<uf>SP</uf>
    	<ibge>3550308</ibge>
    </xmlcep>
    
```

```PHP    
$cepInfo = $cep->toSimpleXml();

$cepInfo->result();

    SimpleXMLElement Object
    (
        [cep] => 01414-001
        [logradouro] => Rua Haddock Lobo
        [bairro] => Cerqueira César
        [localidade] => São Paulo
        [uf] => SP
        [ibge] => 3550308
    )
    
```

```PHP    
$cepInfo = $cep->toPiped();
    
$cepInfo->result();
    
    cep:01414-001|logradouro:Rua Haddock Lobo|bairro:Cerqueira César|localidade:São Paulo|uf:SP|ibge:3550308
    
```
    
```PHP    
$cepInfo = $cep->toQuerty();
    
$cepInfo->result();
    
    cep=01414-001&logradouro=Rua+Haddock+Lobo&bairro=Cerqueira+C%C3%A9sar
        &localidade=S%C3%A3o+Paulo&uf=SP&ibge=3550308
        
```   
    
__Para verificar se aconteceu erros faça:__

```PHP

$cep = Cep::find('01414000');

$cepInfo = $cep->toSimpleXml();


if ($cepInfo->passed())
{

    return $dados->result();

}
else
{

    return 'Cep não encontrado';

}

```
