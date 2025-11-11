<?php

declare(strict_types=1);

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

abstract class AbstractTestCase extends ApiTestCase
{
    protected static ?bool $alwaysBootKernel = false;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
    }
}
