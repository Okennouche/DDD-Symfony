<?php

declare(strict_types=1);

/**
 *
 * @ created on 28/12/18 13:24
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;

use App\DDD\Domain\ValueObject\User\Uuid;


/**
 * class UuidInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface UuidInterface
{
	/**
	 * @param string $uuid
	 *
	 * @return Uuid
	 */
	public static function fromString(string $uuid): Uuid;

	/**
	 * @return string
	 */
	public function toString(): string;
}