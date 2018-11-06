<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommentControllerTest extends WebTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testCommentIndexDoesNotExist()
    {
        $this->client->request('GET', '/comment');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }

    public function testUnauthenticatedUserCannotCreateDomments()
    {
        $this->client->request('GET', '/comment/new');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }

    public function testUnauthenticatedUserCannotEditComments()
    {
        $this->client->request('GET', '/comment/edit');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }

    public function testUnauthenticatedUserCannotDeleteComments()
    {
        $this->client->request('GET', '/comment/delete');
        $this->assertContains('/login', $this->client->getResponse()->getContent());
    }
}
