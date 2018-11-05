<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testApiReturnsData()
    {
        $this->client->request('GET', '/api/posts');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testApiDataExists()
    {
        $this->client->request('GET', '/api/posts');
        $response = $this->client->getResponse();
        $this->assertNotEmpty($response->getContent());
    }
}
