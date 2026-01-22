<?php

namespace App\Tests\Controller\Visitor\Contact;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ContactControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/visitor/contact/contact');

        self::assertResponseIsSuccessful();
    }
}
