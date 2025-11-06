<?php

namespace App\Tests\Api;

class GreetingsTest extends CustomApiTestCase
{
    public function testCreateGreeting(): void
    {
        static::createClient()->request('POST', '/greetings', [
            'json' => [
                'name' => 'Kévin',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Greeting',
            '@type' => 'Greeting',
            'name' => 'Kévin',
        ]);
    }
}
