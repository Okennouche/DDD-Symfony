<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 10:04
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Service\Token\Interfaces;

/**
 * Class GeneratorTokenInterface
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface GeneratorTokenInterface
{
	/**
	 * @param int $entropy
	 *
	 * @return string
	 */
	public static function token(int $entropy): string;
}