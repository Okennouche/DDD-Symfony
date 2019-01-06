<?php

declare(strict_types=1);

/**
 *
 * @ created on 29/12/18 21:38
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;

/**
 * Interface PasswordConfirmInterface
 *
 * @package App\DDD\Domain\ValueObject\User\Interfaces
 */
interface PasswordConfirmInterface
{
	/**
	 * @param string $password
	 * @param string $confirmePassword
	 */
	public static function fromString(string $password, string $confirmePassword): void;
}