<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 18:54
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User;

use Assert\Assertion;
use App\DDD\Domain\ValueObject\User\Interfaces\EmailInterface;


/**
 * class Email
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
final class Email implements EmailInterface
{

	/**
	 * @var string
	 */
	private $email;

	/**
	 * @inheritdoc
	 */
	public static function fromString(string $email): Email
	{

		Assertion::email($email, 'This email is not valid.');

		$emailVO = new self();

		$emailVO->email = $email;

		return $emailVO;
	}

	/**
	 * @inheritdoc
	 */
	public function toString(): string
	{
		return $this->email;
	}
}