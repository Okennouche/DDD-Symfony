<?php

declare(strict_types=1);

/**
 *
 * @ Created on 29/12/18 21:38
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;

use App\DDD\Domain\ValueObject\User\Password;


/**
 * Interface PasswordInterface
 *
 * @package App\DDD\Domain\ValueObject\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface PasswordInterface
{
	/**
	 * @param string $password
	 *
	 * @return Password
	 */
	public static function fromString(string $password): Password;

	/**
	 * @return string
	 */
	public function toString(): string;
}