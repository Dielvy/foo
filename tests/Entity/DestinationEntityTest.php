<?php

namespace App\Tests\Entity;

use App\Entity\Destination;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DestinationEntityTest extends KernelTestCase
{
    private ValidatorInterface $validator;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->validator = static::getContainer()->get(ValidatorInterface::class);
    }

    /**
     * Test that valid destination passes validation
     */
    public function testValidDestinationPassesValidation(): void
    {
        $destination = new Destination();
        $destination->setName('Paris');
        $destination->setDescription('Beautiful city with museums and history');
        $destination->setPrice(1200);
        $destination->setDuration(5);
        $destination->setImage('paris.jpg');

        $errors = $this->validator->validate($destination);
        self::assertCount(0, $errors);
    }

    /**
     * Test that destination name must not be blank
     */
    public function testDestinationNameCannotBeBlank(): void
    {
        $destination = new Destination();
        $destination->setName('');
        $destination->setDescription('Beautiful city with museums and history');
        $destination->setPrice(1200);
        $destination->setDuration(5);
        $destination->setImage('paris.jpg');

        $errors = $this->validator->validate($destination);
        self::assertGreaterThan(0, count($errors));
    }

    /**
     * Test that destination description must not be blank
     */
    public function testDestinationDescriptionCannotBeBlank(): void
    {
        $destination = new Destination();
        $destination->setName('Paris');
        $destination->setDescription('');
        $destination->setPrice(1200);
        $destination->setDuration(5);
        $destination->setImage('paris.jpg');

        $errors = $this->validator->validate($destination);
        self::assertGreaterThan(0, count($errors));
    }

    /**
     * Test that destination price must be greater than 0
     */
    public function testDestinationPriceMustBeGreaterThanZero(): void
    {
        $destination = new Destination();
        $destination->setName('Paris');
        $destination->setDescription('Beautiful city with museums and history');
        $destination->setPrice(0);
        $destination->setDuration(5);
        $destination->setImage('paris.jpg');

        $errors = $this->validator->validate($destination);
        self::assertGreaterThan(0, count($errors));
    }

    /**
     * Test that destination duration must be greater than 0
     */
    public function testDestinationDurationMustBeGreaterThanZero(): void
    {
        $destination = new Destination();
        $destination->setName('Paris');
        $destination->setDescription('Beautiful city with museums and history');
        $destination->setPrice(1200);
        $destination->setDuration(0);
        $destination->setImage('paris.jpg');

        $errors = $this->validator->validate($destination);
        self::assertGreaterThan(0, count($errors));
    }

    /**
     * Test that destination image must not be blank
     */
    public function testDestinationImageCannotBeBlank(): void
    {
        $destination = new Destination();
        $destination->setName('Paris');
        $destination->setDescription('Beautiful city with museums and history');
        $destination->setPrice(1200);
        $destination->setDuration(5);
        $destination->setImage('');

        $errors = $this->validator->validate($destination);
        self::assertGreaterThan(0, count($errors));
    }
}
