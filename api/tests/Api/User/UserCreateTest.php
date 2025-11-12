<?php

declare(strict_types=1);

namespace App\Tests\Api\User;

use App\Entity\User;
use App\Tests\AbstractTestCase;
use Doctrine\ORM\EntityManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

final class UserCreateTest extends AbstractTestCase
{
    use ResetDatabase;
    use Factories;

    private ?EntityManager $entityManager;
    private ?UserPasswordHasher $passwordHasher;

    protected function setUp(): void
    {
        parent::setUp();

        $container = self::$kernel->getContainer();

        $this->entityManager = $container
            ->get('doctrine')
            ->getManager();

        $this->passwordHasher = $container
            ->get('security.user_password_hasher');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function testCreateUser(): void
    {
        $response = static::createClient(defaultOptions: ['headers' => ['Content-type' => 'application/ld+json']])->request('POST', '/users', ['json' => [
            'email' => 'user@email.com',
            'plainPassword' => 'User@123!',
            'name' => 'User Test',
            'cpf' => '12312312312',
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        $this->assertJsonContains([
            '@context' => '/contexts/User',
            '@type' => 'User',
            'email' => 'user@email.com',
            'name' => 'User Test',
            'cpf' => '12312312312',
        ]);

        $this->assertMatchesRegularExpression('~^/users/\d+$~', $response->toArray()['@id']);
        $this->assertMatchesResourceItemJsonSchema(User::class);

        /** @var User */
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => 'user@email.com']);

        $this->assertTrue($this->passwordHasher->isPasswordValid($user, 'User@123!'));
    }
}
