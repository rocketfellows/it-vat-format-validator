<?php

namespace rocketfellows\ITVatFormatValidator\tests\unit;

use PHPUnit\Framework\TestCase;
use rocketfellows\ITVatFormatValidator\ITVatFormatValidator;

class ITVatFormatValidatorTest extends TestCase
{
    /**
     * @var ITVatFormatValidator
     */
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new ITVatFormatValidator();
    }

    /**
     * @dataProvider getVatNumbersProvidedData
     */
    public function testValidationResult(string $vatNumber, bool $isValid): void
    {
        $this->assertEquals($isValid, $this->validator->isValid($vatNumber));
    }

    public function getVatNumbersProvidedData(): array
    {
        return [
            [
                'vatNumber' => 'IT12345678901',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'IT00000000000',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'IT11111111111',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'IT99999999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => '12345678901',
                'isValid' => true,
            ],
            [
                'vatNumber' => '00000000000',
                'isValid' => true,
            ],
            [
                'vatNumber' => '11111111111',
                'isValid' => true,
            ],
            [
                'vatNumber' => '99999999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'IT1234567890',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'IT123456789011',
                'isValid' => false,
            ],
            [
                'vatNumber' => '123456789011',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1234567890',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'DE12345678901',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1',
                'isValid' => false,
            ],
            [
                'vatNumber' => '0',
                'isValid' => false,
            ],
            [
                'vatNumber' => '',
                'isValid' => false,
            ],
        ];
    }
}
