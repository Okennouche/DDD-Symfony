<?php

declare(strict_types=1);

/**
 *
 * @ Created on 05/01/19 19:47
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\Encoder;

use App\DDD\Domain\Exception\User\PasswordIsValidException;
use App\DDD\Security\User\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Security\Core\Encoder\Argon2iPasswordEncoder;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class Encoder
 *
 * @package App\DDD\Security\User\Encoder
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Encoder implements EncoderInterface
{
	const COST = 24;

	/**
	 * @var Argon2iPasswordEncoder
	 */
	private $encoderArgon2;
	/**
	 * @var TranslatorInterface
	 */
	private $translator;

	/**
	 * @inheritdoc
	 */
	public function __construct(TranslatorInterface $translator)
	{
		$this->encoderArgon2 = new Argon2iPasswordEncoder(self::COST);
		$this->translator = $translator;
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
		$isValid = $this->encoderArgon2->isPasswordValid($passwordEncoded, $plainPassword, null);

		if(!$isValid) {
			throw new PasswordIsValidException(
				$this->translator->trans('login_error_email_username', [], 'security_login')
			);
		}

		return $isValid;
	}
}