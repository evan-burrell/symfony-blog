<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testIndexExists()
    {
        $this->client->request('GET', '/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testIndexNavbarElementExists()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertCount(1, $crawler->filter('#no-auth-navbar'));
    }

    public function testIndexAuthNavbarDoesNotExists()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertCount(0, $crawler->filter('#auth-navbar'));
    }
}
