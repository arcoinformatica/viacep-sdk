<?php

namespace Sdk\ViaCep\Tests;

use PHPUnit\Framework\TestCase;
use Sdk\ViaCep\Service\ViaCep;

class BuscaCepTest extends TestCase
{

    public function testToken(): void
    {
        $service = new ViaCep();
        dump($service->get("29304655"));

        $this->assertTrue(true);
    }
}
