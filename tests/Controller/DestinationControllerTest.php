<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class DestinationControllerTest extends WebTestCase
{
    /**
     * Test that the home page loads successfully
     */
    public function testHomepageLoads(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
    }

    /**
     * Test that a non-existent destination returns 404
     */
    public function testNonExistentDestinationReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/destination/99999');

        self::assertResponseStatusCodeSame(404);
    }
}
