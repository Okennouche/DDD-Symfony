<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:34
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\ClassNameHelper;

use App\DDD\Shared\ClassNameHelper\Interfaces\ClassNameHelperInterface;

/**
 * Class ClassNameHelper
 *
 * @package App\DDD\Shared\ClassNameHelper
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class ClassNameHelper implements ClassNameHelperInterface
{
	/**
	 * @inheritdoc
	 */
	public static function getShortClassName($fullClassName): string
	{
		if (empty(self::getNamespace($fullClassName))) {
			return $fullClassName;
		}
		return substr($fullClassName, strrpos($fullClassName, '\\') + 1);
	}

	/**
	 * @inheritdoc
	 */
	public static function getNamespace(string $fullClassName): string
	{
		return substr($fullClassName, 0, strrpos($fullClassName, '\\'));
	}
}