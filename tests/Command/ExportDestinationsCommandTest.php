<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ExportDestinationsCommandTest extends KernelTestCase
{
    /**
     * Test that the export command exists
     */
    public function testCommandExists(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:export-destinations');
        self::assertNotNull($command);
    }
}
