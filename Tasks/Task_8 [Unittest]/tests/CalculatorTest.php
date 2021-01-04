<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;
require_once (__DIR__ . '/../lib/Calculator.php');

class CalculatorTest extends TestCase
{
	public function testAdd(): void
	{
		$calculator = new Calculator();
		self::assertEquals(4, $calculator->add(2, 2));
		self::assertEquals(-4, $calculator->add(-2, -2));
		self::assertEquals(2, $calculator->add(2, 0));
		self::assertEquals(0, $calculator->add(2, -2));
	}

	public function testSubtract(): void
	{
		$calculator = new Calculator();
		self::assertEquals(0, $calculator->subtract(2, 2));
		self::assertEquals(-4, $calculator->subtract(-2, 2));
		self::assertEquals(4, $calculator->subtract(2, -2));
		self::assertEquals(1, $calculator->subtract(-2, -3));
	}

	public function testMultiply(): void
	{
		$calculator = new Calculator();
		self::assertEquals(6, $calculator->multiply(2, 3));
		self::assertEquals(-6, $calculator->multiply(-2, 3));
		self::assertEquals(9, $calculator->multiply(-3, -3));
		self::assertEquals(0, $calculator->multiply(0, 3));
	}

	public function testDivide(): void
	{
		$calculator = new Calculator();
		self::assertEquals(2, $calculator->divide(8, 4));
		self::assertEquals(2, $calculator->divide(-8, -4));
		self::assertEquals(-1, $calculator->divide(4, -4));
		self::assertEquals(0, $calculator->divide(0, -4));
		self::assertEquals(2.5, $calculator->divide(5, 2));
	}

	public function testDivideException(): void
	{
		$calculator = new Calculator();

		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Divider cant be a zero');
		$calculator->divide(4, 0);
	}

	public function testPow(): void
	{
		$calculator = new Calculator();
		self::assertEquals(16, $calculator->pow(2, 4));
		self::assertEquals(0.0625, $calculator->pow(2, -4));
		self::assertEquals(16, $calculator->pow(-2, 4));
		self::assertEquals(-32, $calculator->pow(-2, 5));
		self::assertEquals(1, $calculator->pow(0, 0));
		self::assertEquals(8, $calculator->pow(2, 3.81));
	}

	public function testSqrt(): void
	{
		$calculator = new Calculator();
		self::assertEquals(3, $calculator->sqrt(9));
		self::assertEquals(4, $calculator->sqrt(16.32));
		self::assertEquals(3.1622776601684, $calculator->sqrt(10));
		self::assertEquals(0, $calculator->sqrt(0));
		self::assertNan($calculator->sqrt(-10));
	}
}
