<?php

declare(strict_types=1);

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\StringCalculator;
use Exception;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stringCalculator = new StringCalculator();
    }

    /**
     * @test
     * @throws Exception
     */
    public function givenSingleNumberReturnsSameNumber(): void
    {
        $this->assertEquals(1, $this->stringCalculator->add('1'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function givenNumbersReturnsAddNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->add('1,2,3'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function givenNumbersSeparatedByCommasAndLineBreakReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->add('1\n2,3'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function givenNumbersSeparatedByCustomDelimiterReturnSumOfNumbers(): void
    {
        $this->assertEquals(3, $this->stringCalculator->add('//&\n1&2'));
    }

    /**
     * @test
     */
    public function givenOneNegativeNumberThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('negativos no soportados: -1');
        $this->stringCalculator->add('-1');
    }
}