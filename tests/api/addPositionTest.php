<?php


use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Dotenv\Dotenv;


class addPositionTest extends TestCase
	{
	private $client;


	public function setUp()
		{
		$dotenv = new Dotenv(__DIR__ . '/../..');
		$dotenv->load();
		$Host = getenv('TARGET_HOST');
		$this->client = new Client(['base_uri' => "http://$Host/"]);
		}


	public function tearDown()
		{
		$this->client = null;
		}


	public function testPost()
		{
		$response = $this->client->request('POST', getenv('TARGET_PATH'));

		$this->assertEquals(200, $response->getStatusCode());

		$contentType = $response->getHeaders()["Content-Type"][0];
		$this->assertEquals("application/json", $contentType);

		// TODO: More testing here.
		}
	}
