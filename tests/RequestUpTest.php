<?php

declare(strict_types=1);

namespace PHPUnit\SelfTest\Basic;

use Canducci\Cep\CepRequest;
use PHPUnit\Framework\TestCase;

class RequestUpTest extends TestCase
{
    private $request;
    public function setUp(): void
    {
        $this->request = new CepRequest();
    }

    public function testRequestUrlFake()
    {
        $data = $this->request->get('https://jsonplaceholder.typicode.com/users');
        $this->assertTrue(200 === $data['httpCode']);
        $this->assertTrue(10 === count(json_decode($data['body'])));
    }

    public function testRequestUrlFakeHttpCode()
    {
        $data = $this->request->get('https://jsonplaceholder.typicode.com/users');
        $this->assertTrue(200 === $data['httpCode']);
    }
}
