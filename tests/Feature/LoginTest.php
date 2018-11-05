<?php

namespace App\Tests\Feature;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->email = 'example@example.com';
        $this->password = 'password';
    }

    public function testUserCanLogin()
    {
        $crawler = $this->client->request('GET', '/login');
        $buttonCrawlerNode = $crawler->selectButton('submit');
        $form = $buttonCrawlerNode->form();
        $data = array('email' => $this->email, 'password' => $this->password);
        $this->client->submit($form, $data);
        $crawler = $this->client->followRedirect();
        $this->assertContains($this->email, $this->client->getResponse()->getContent());
    }
}
