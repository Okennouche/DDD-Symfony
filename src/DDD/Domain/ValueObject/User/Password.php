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

namespace App\DDD\Domain\ValueObject\User;

use Assert\Assertion;
use App\DDD\Domain\ValueObject\User\Interfaces\PasswordInterface;

/**
 * Class Password
 *
 * @package App\DDD\Domain\ValueObject\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Password implements PasswordInterface
{
	const MIN_LENGTH = 8;
	const FORMAT = '/^[a-zA-Z0-9]+$/';

	/**
	 * @var $password
	 */
	private $password;

	/**
	 * @param string $password
	 *
	 * @return Password
	 */
	public static function fromString(string $password): Password
	{
		Assertion::notBlank($password, 'The password should not be blank.');
		Assertion::minLength($password, self::MIN_LENGTH, 'The password should contain ' . self::MIN_LENGTH . ' characters.');
		Assertion::regex($password, self::FORMAT, 'The format of the password is invalid.');

		$passwordVO = new self();

		$passwordVO->password = $password;

		return $passwordVO;
	}

	/**
	 * @return string
	 */
	public function toString(): string
	{
		return $this->password;
	}
}