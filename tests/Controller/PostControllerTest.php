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

    public function testPostIndexDoesNotExists()
    {
        $this->client->request('GET', '/post');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
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

    public function testUnauthenticatedUserCannotCreatePosts()
    {
        $this->client->request('GET', '/post/new');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }

    public function testUnauthenticatedUserCannotEditPosts()
    {
        $this->client->request('GET', '/post/edit');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }

    public function testUnauthenticatedUserCannotDeletePosts()
    {
        $this->client->request('GET', '/post/delete');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }
}
