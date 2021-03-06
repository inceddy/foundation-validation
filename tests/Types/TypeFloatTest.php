<?php
use Everest\Validation\Types\TypeFloat;
use Everest\Validation\InvalidValidationException;

class TypeFloatTest extends \PHPUnit\Framework\TestCase {

	public function validInputProvider()
	{
		return [
			[    0, 0.0],
			[  5.1, 5.1],
			['5.1', 5.1],
		];
	}

	public function invalidInputProvider()
	{
		return [
			[' '],
			['5.1a'],
			[false]
		];
	}

	/**
	 * @dataProvider validInputProvider
	 */
	
	public function testValidInput($input, $expected)
	{
		$value = (new TypeFloat)($input);
		$this->assertSame($expected, $value);
	}

	/**
	 * @dataProvider invalidInputProvider
	 */

	public function testInvalidInput($input)
	{
		$this->expectException(InvalidValidationException::CLASS);
		$value = (new TypeFloat)($input);
	}
}
