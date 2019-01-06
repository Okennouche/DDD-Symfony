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

namespace App\DDD\Domain\ValueObject\User;

use Assert\Assertion;
use App\DDD\Domain\ValueObject\User\Interfaces\PasswordConfirmInterface;


/**
 * class PasswordConfirm
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
final class PasswordConfirm implements PasswordConfirmInterface
{
	/**
	 * @inheritdoc
	 */
	public static function fromString(string $password, string $confirmePassword): void
	{
		Assertion::eq($password, $confirmePassword,'Passwords are different');
	}
}