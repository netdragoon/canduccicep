<?php

use Illuminate\Foundation\Testing;

class CepTest extends TestCase {


    public function setUp()
    {

        parent::setUp();

    }

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

        //return require __DIR__.'/../../start.php';
        return require '/../../../bootstrap/start.php';
    }

    /**
     * @return Canducci\ZipCode\ZipCode
     */
    public function getCepInstance()
    {

        return new Canducci\Cep\Cep(new Canducci\Cep\LoadData());

    }

    public function testCepInstance()
    {

        $cep = $this->getCepInstance();

        $this->assertInstanceOf('Canducci\Cep\Cep', $cep);

    }

    public function testCepInfoInstance()
    {

        $cep = $this->getCepInstance();

        $cepInfo = $cep->find('01414000')->toJson();

        $this->assertInstanceOf('Canducci\Cep\CepInfo', $cepInfo);


    }

    public function testCepInfoReturnJson()
    {
        $cep = $this->getCepInstance();

        $this->assertJson($cep->find('01414000')->toJson()->result());

    }

    public function testCepInfoReturnArray()
    {

        $cep = $this->getCepInstance();

        $this->assertInternalType('array',$cep->find('01414000')->toArray()->result());

    }

    public function testCepInfoReturnObject()
    {

        $cep = $this->getCepInstance();

        $this->assertInternalType('object',$cep->find('01414000')->toObject()->result());

    }

    public function testCepInfoTruePassed()
    {
        $cep = $this->getCepInstance();

        $this->assertTrue($cep->find('01414000')->toObject()->passed());

    }

    public function testCepInfoFalsePassed()
    {
        $cep = $this->getCepInstance();

        $this->assertFalse($cep->find('01414011')->toObject()->passed());

    }

    public function testCepParseException()
    {

        $this->setExpectedException('Exception');

        Canducci\Cep\Cep::parse('');
        Canducci\Cep\Cep::parse(1111111);
        Canducci\Cep\Cep::parse('1111111');

    }

}

//D:\Sites\www\packages\laravel42\vendor\bin>phpunit ..\canducci\cep\tests\CepTest.php

