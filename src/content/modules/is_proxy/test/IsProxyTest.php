<?php
class IsProxyTest extends \PHPUnit\Framework\TestCase {
	public function tearDown() {
		unset ( $_SERVER ["HTTP_FORWARDED_FOR"] );
	}
	
	public function testIsProxyReturnsFalse(){
		unset ( $_SERVER ["HTTP_FORWARDED_FOR"] );
		$this->assertFalse ( is_proxy () );
	}
	public function testIsProxyReturnsTrue() {		
		$_SERVER ["HTTP_FORWARDED_FOR"] = "X-Forwarded-For: 75.141.127.128, 
210.82.237.219, 164.124.134.65";
		$this->assertTrue ( is_proxy () );
	}
}