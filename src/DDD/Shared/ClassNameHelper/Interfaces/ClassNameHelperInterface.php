<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:36
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\ClassNameHelper\Interfaces;


/**
 * Class ClassNameHelperInterface
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface ClassNameHelperInterface
{
	/**
	 * @param $fullClassName
	 *
	 * @return string
	 */
	public static function getShortClassName($fullClassName): string;

	/**
	 * @param string $fullClassName
	 *
	 * @return string
	 */
	public static function getNamespace(string $fullClassName): string;
}