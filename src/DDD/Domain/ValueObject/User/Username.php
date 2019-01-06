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

namespace App\DDD\Domain\ValueObject\User;

use Assert\Assertion;
use App\DDD\Domain\ValueObject\User\Interfaces\UsernameInterface;


/**
 * class Username
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
final class Username implements UsernameInterface
{

	const MIN_LENGTH = 2;
	const FORMAT = '/^[a-zA-Z0-9]+$/';

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @inheritdoc
	 */
	public static function fromString(?string $username): self
	{
		Assertion::notNull($username, 'The username should not be null.');
		Assertion::notBlank($username, 'The username should not be blank.');
		Assertion::minLength($username, self::MIN_LENGTH, 'The username should contain ' . self::MIN_LENGTH . ' characters.');
		Assertion::regex($username, self::FORMAT, 'The format of the username is invalid.');

		$usernameVO = new self();

		$usernameVO->username = $username;

		return $usernameVO;
	}

	/**
	 * @inheritdoc
	 */
	public function toString(): string
	{
		return $this->username;
	}
}