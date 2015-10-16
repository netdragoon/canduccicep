<?php

use Illuminate\Foundation\Testing;

class CepTest extends TestCase {

    /**
     * Creates the application.
     *
     * Needs to be implemented by subclasses.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'D:\Sites\www\packages\laravel42\bootstrap\start.php';
    }

    /**
     * @return Canducci\ZipCode\ZipCode
     */
    public function getCepInstance()
    {

        return new \Canducci\Cep\Cep(new \Canducci\Cep\LoadData());

    }

    public function testInstance()
    {

        $cep = $this->getCepInstance();

        return $cep->find('01414000');

    }
}

//D:\Sites\www\packages\laravel42\vendor\bin>phpunit ..\canducci\cep\tests\CepTest.php

