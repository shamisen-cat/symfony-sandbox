<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Hello;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HelloControllerTest extends WebTestCase
{
    public function testIndexDisplaysHelloWorld(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(200);
        self::assertSelectorTextContains('h1', 'hello, world');
    }
}
