<?php

class WPNonceTest extends WP_UnitTestCase {

	function setup()
	{
		require_once "WPNonce.php";
	}


	function test() 
	{
		$nonce = WPNonce::createNonce('test');
		$this->assertTrue(is_array($nonce));
		$this->assertArrayHasKey('name',$nonce);
		$this->assertArrayHasKey('value',$nonce);
		$this->assertTrue(WPNonce::checkNonce($nonce['name'],$nonce['value']));
		return;
	}


	function testUsedOnce()
	{
		$nonce = WPNonce::createNonce('test');
		$this->assertNotEmpty($nonce['name']);
		$this->assertTrue(WPNonce::checkNonce($nonce['name'],$nonce['value']));
		$this->assertFalse(WPNonce::checkNonce($nonce['name'],$nonce['value']));
		return;
	}


	function testCleanup()
	{
		$nonce = [];
		$nonce[] = WPNonce::createNonce('test1');
		$nonce[] = WPNonce::createNonce('test2');
		$nonce[] = WPNonce::createNonce('test3');
		$this->assertTrue(WPNonce::checkNonce($nonce[0]['name'],$nonce[0]['value']));
		$this->assertEquals(WPNonce::clearNonces(true),2);
		$this->assertFalse(WPNonce::checkNonce($nonce[1]['name'],$nonce[1]['value']));
		return;
	}

}