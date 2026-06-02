<?php

namespace Tests\Exception;

use Bpost\BpostApiClient\Exception\BpostNotImplementedException;
use PHPUnit\Framework\TestCase;

class BpostNotImplementedExceptionTest extends TestCase
{
    public function testGetMessage()
    {
        $ex = new BpostNotImplementedException();
        $this->assertStringContainsString('Not implemented', $ex->getMessage());
    }
}
