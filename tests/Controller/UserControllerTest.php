<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testLoginPage()
    {
        $client = static::createClient();

        $client->request('GET', "/login");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testRegisterPage()
    {
        $client = static::createClient();

        $client->request('GET', "/register");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
