<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 19:47
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Security\Encoder;

use App\DDD\Domain\Security\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Security\Core\Encoder\Argon2iPasswordEncoder;


/**
 * class Encoder
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class Encoder implements EncoderInterface
{
	const COST = 24;

	/**
	 * @var Argon2iPasswordEncoder
	 */
	private $encoderArgon2;

	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		$this->encoderArgon2 = new Argon2iPasswordEncoder(self::COST);
	}

	/**
	 * Encodes the raw password.
	 *
	 * @param string $plainPassword The password to encode
	 * @param string $salt The salt
	 *
	 * @return string The encoded password
	 */
	public function encodePassword($plainPassword, $salt): string
	{
		return $this->encoderArgon2->encodePassword($plainPassword, $salt);
	}

	/**
	 * Checks a raw password against an encoded password.
	 *
	 * @param string $passwordEncoded An encoded password
	 * @param string $plainPassword A plain password
	 * @param string $salt The salt
	 *
	 * @return bool true if the password is valid, false otherwise
	 */
	public function isPasswordValid($passwordEncoded, $plainPassword, $salt): bool
	{
		return $this->encoderArgon2->isPasswordValid($passwordEncoded, $plainPassword, null);
	}
}