<?php
class IsProxyTest extends PHPUnit_Framework_TestCase {
	public function tearDown() {
		unset ( $_SERVER ["HTTP_FORWARDED_FOR"] );
	}
	public function testIsProxy() {
		$this->assertFalse ( is_proxy () );
		
		$_SERVER ["HTTP_FORWARDED_FOR"] = "X-Forwarded-For: 75.141.127.128, 
210.82.237.219, 164.124.134.65";
		$this->assertTrue ( is_proxy () );
	}
}