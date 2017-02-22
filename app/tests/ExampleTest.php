<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/i/login');
		$crawler = $this->client->request('GET', '/i/signup');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
