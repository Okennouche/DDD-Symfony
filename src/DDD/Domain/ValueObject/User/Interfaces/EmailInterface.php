<?php

declare(strict_types=1);

/**
 *
 * @ created on 28/12/18 12:59
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User\Interfaces;

use App\DDD\Domain\ValueObject\User\Email;


/**
 * class EmailInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface EmailInterface
{
	/**
	 * @param string $email
	 *
	 * @return Email
	 */
	public static function fromString(string $email): Email;

	/**
	 * @return string
	 */
	public function toString(): string;
}