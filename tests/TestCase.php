<?php

namespace Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__ . '\\..\\');
        $dotenv->load();
    }
}
