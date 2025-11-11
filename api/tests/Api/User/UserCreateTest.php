<?php

declare(strict_types=1);

namespace App\Tests\Api\User;

use App\Entity\User;
use App\Tests\AbstractTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

final class UserCreateTest extends AbstractTestCase
{
    use ResetDatabase;
    use Factories;

    public function testCreateUser(): void
    {
        $response = static::createClient(defaultOptions: ['headers' => ['Content-type' => 'application/ld+json']])->request('POST', '/users', ['json' => [
            'email' => 'user@email.com',
            'password' => 'User@123!',
            'name' => 'User Test',
            'cpf' => '12312312312',
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        $this->assertJsonContains([
            '@context' => '/contexts/User',
            '@type' => 'User',
            'email' => 'user@email.com',
            'password' => 'User@123!',
            'name' => 'User Test',
            'cpf' => '12312312312',
        ]);

        $this->assertMatchesRegularExpression('~^/users/\d+$~', $response->toArray()['@id']);
        $this->assertMatchesResourceItemJsonSchema(User::class);
    }
}
