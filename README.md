# CANDUCCI CEP

__Web Service provided by http://viacep.com.br/__

[![Canducci Cep](https://fulviocanducci.files.wordpress.com/2015/01/1948132_691123557596602_6995479600312612395_n.png)](https://packagist.org/packages/canducci/cep)

## Quick start

### Required setup

In the `require` key of `composer.json` file add the following

```PHP
"canducci/cep": "dev-master"
```

Run the Composer update comand

    $ composer update

In your `config/app.php` add `'Canducci\Cep\CepServiceProvider'` to the end of the `providers` array

```PHP
'providers' => array(
    ...,
    'Illuminate\Workbench\WorkbenchServiceProvider',
    'Canducci\Cep\CepServiceProvider',

),
```

At the end of `config/app.php` add `'Cep' => 'Canducci\Cep\Facade\Cep'` to the `aliases` array

```PHP
'aliases' => array(
    ...,
    'View'       => 'Illuminate\Support\Facades\View',
    'Cep'        => 'Canducci\Cep\Facade\Cep',

),
```

##How to Use

To use is very simple, pass the ZIP and calls the various types of returns, like this:

```PHP
$cep = Cep::find('01414-001');
```

Type returns:
```PHP    
$cep->toJon();

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
$cep->toArray();
    
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
$cep->toObject();
    
    
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
$cep->toXml();
    
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
$cep->toSimpleXml();

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
$cep->toPiped();
    
    cep:01414-001|logradouro:Rua Haddock Lobo|bairro:Cerqueira César|localidade:São Paulo|uf:SP|ibge:3550308
```
    
```PHP    
$cep->toQuerty();
    
    cep=01414-001&logradouro=Rua+Haddock+Lobo&bairro=Cerqueira+C%C3%A9sar&localidade=S%C3%A3o+Paulo&uf=SP&ibge=3550308
```   
    
__To check if any errors had to do:__

```PHP
$cep   = Cep::find('01414001');			
$dados = $cep->toQuerty();

if ($dados) {
	//ZIP EXISTING
} else {
	//POSTAL CODE NO EXISTING 
}
```
