<?php

namespace App\Tests\Controller\Admin\Category;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CategoryControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/admin/category/category');

        self::assertResponseIsSuccessful();
    }
}
