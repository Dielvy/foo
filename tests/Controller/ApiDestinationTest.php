<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiDestinationTest extends WebTestCase
{
    /**
     * Test that API endpoint returns JSON
     */
    public function testApiReturnsJson(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/destinations');

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
    }

    /**
     * Test that API is public (no authentication required)
     */
    public function testApiIsPublic(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/destinations');

        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(200);
    }
}
