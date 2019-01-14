<?php

declare(strict_types=1);

/**
 *
 * @ Created on 28/12/18 13:24
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;

use App\DDD\Domain\ValueObject\User\Uuid;

/**
 * Interface GeneratorUuidInterface
 *
 * @package App\DDD\Domain\ValueObject\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
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