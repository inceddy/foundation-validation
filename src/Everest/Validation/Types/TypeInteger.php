<?php

/*
 * This file is part of Everest.
 *
 * (c) 2018 Philipp Steingrebe <development@steingrebe.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Everest\Validation\Types;
use Everest\Validation\InvalidValidationException;

class TypeInteger extends Type {

	public static $errorName = 'invalid_integer';
	public static $errorMessage = '%s is not a valid integer.';

	public function __invoke($value, $message = null, string $key = null)
	{
		if (!is_numeric($value) || (int) $value != $value) {
			$message = sprintf(
				self::generateErrorMessage($message ?: self::$errorMessage),
				self::stringify($value)
			);

			throw new InvalidValidationException(self::$errorName, $message, $key, $value);
		}

		return (int) $value;
	}
}
