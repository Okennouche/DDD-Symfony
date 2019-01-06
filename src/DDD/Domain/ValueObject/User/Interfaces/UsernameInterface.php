<?php

declare(strict_types=1);

/**
 *
 * @ created on 29/12/18 20:23
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;


use App\DDD\Domain\ValueObject\User\Username;

/**
 * Interface UsernameInterface
 *
 * @package App\DDD\Domain\ValueObject\User\Interfaces
 */
interface UsernameInterface
{
	/**
	 * @param string $username
	 *
	 * @return Username
	 */
	public static function fromString(string $username): Username;

	/**
	 * @return string
	 */
	public function toString(): string;
}