<?php

declare(strict_types=1);

use function UliCMS\Utils\Network\is_proxy;

class IsProxyTest extends \PHPUnit\Framework\TestCase
{
    protected function tearDown(): void
    {
        unset($_SERVER ["HTTP_FORWARDED_FOR"]);
    }
    
    public function testIsProxyReturnsFalse()
    {
        unset($_SERVER ["HTTP_FORWARDED_FOR"]);
        $this->assertFalse(is_proxy());
    }
    public function testIsProxyReturnsTrue()
    {
        $_SERVER ["HTTP_FORWARDED_FOR"] = "X-Forwarded-For: 75.141.127.128, 
210.82.237.219, 164.124.134.65";
        $this->assertTrue(is_proxy());
    }
}
