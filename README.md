# CANDUCCI CEP

__Web Service provided by http://viacep.com.br/__

[![Canducci Cep](http://i666.photobucket.com/albums/vv25/netdragoon/cep_zpsoqtae5hr.png)](https://packagist.org/packages/canducci/cep)

[![Build Status](https://travis-ci.org/netdragoon/canduccicep.svg?branch=master)](https://travis-ci.org/netdragoon/cep)
[![Packagist](https://img.shields.io/packagist/dt/canducci/cep.svg?style=flat)](https://packagist.org/packages/canducci/cep)
[![Packagist](https://img.shields.io/packagist/l/canducci/cep.svg)](https://packagist.org/packages/canducci/cep)
[![Packagist](https://img.shields.io/packagist/v/canducci/cep.svg?label=version)](https://packagist.org/packages/canducci/cep)

### Demo

[Demo Canducci ZipCode](http://zipcodedemo.herokuapp.com/)

## Quick start

### Required setup

In the `require` key of `composer.json` file add the following

```PHP
"canducci/cep": "1.0.*"
```

Run the Composer update comand

    $ composer update

In your `config/app.php` add
 
- version 1.* `'Canducci\Cep\CepServiceProvider'` or
- version 2.* `'Canducci\Cep\Providers\CepServiceProvider'` to the end of the `providers` array

```PHP
'providers' => array(
    ...,
    'Illuminate\Workbench\WorkbenchServiceProvider',
    'Canducci\Cep\CepServiceProvider', // version 1.* or
    'Canducci\Cep\Providers\CepServiceProvider', // version 2.*

),
```

At the end of `config/app.php` add
 
- version: 1.* `'Cep' => 'Canducci\Cep\Facade\Cep'` or
- version: 2.* `'Cep' => 'Canducci\Cep\Facades\Cep'` to the `aliases` array

```PHP
'aliases' => array(
    ...,
    'View'       => 'Illuminate\Support\Facades\View',
    'Cep'        => 'Canducci\Cep\Facade\Cep', // version 1.* or
    'Cep'        => 'Canducci\Cep\Facades\Cep', // version 2.*

),
```

##How to Use

To use is very simple, pass the ZIP and calls the various types of returns, like this:

####Facade

```PHP
$cep = Cep::find('01414-001');
```

####Injection
```PHP
Route::get("cep", function(Canducci\Cep\Contracts\ICep $cep)
{    
    
});
```
####Function
```PHP
$cep = cep('01414-001');
```

###Type returns:

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
    
__To check if any errors had to do:__

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
