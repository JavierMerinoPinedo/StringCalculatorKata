<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    private StringCalculator $calculadora;

    protected function setUp(): void
    {
        parent::setUp();

        $this->calculadora = new StringCalculator();
    }

    /**
     * @test
     */
    public function givenVoidStringReturns0(): void
    {
        // Act
        $result = $this->calculadora->Add("");

        // Assert
        $this->assertEquals(0, $result);
    }
}
