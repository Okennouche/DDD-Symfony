<?php

declare(strict_types=1);

/**
 *
 * @ created on 27/12/18 19:11
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Entity\User;

use Symfony\Component\Security\Core\User\UserInterface;


/**
 * class User
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class User implements UserInterface, \Serializable
{
	/**
	 * @var string
	 */
	private $uuid;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $email;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var $roles
	 */
	private $roles = [];

	/**
	 * @var string
	 */
	private $confirmationToken;

	/**
	 * @var boolean
	 */
	private $isEnabled;

	/**
	 * @var \DateTimeImmutable
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 */
	private $updatedAt;

	/**
	 * User constructor.
	 *
	 * @param string $uuid
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 */
	public function __construct(
		string $uuid,
		string $username,
		string $email,
		string $password
	) {
		$this->uuid = $uuid;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->createdAt = new \DateTimeImmutable();
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->uuid;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string
	{
		return $this->username;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Returns the password used to authenticate the user.
	 *
	 * This should be the encoded password. On authentication, a plain-text
	 * password will be salted, encoded, and then compared to this value.
	 *
	 * @return string The password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	public function getRoles(): array
	{
		$roles = $this->roles;
		// guarantee every user at least has ROLE_USER
		$roles[] = 'ROLE_USER';

		return array_unique($roles);
	}

	/**c
	 * @return string
	 */
	public function getConfirmationToken(): string
	{
		return $this->confirmationToken;
	}

	/**
	 * @return bool
	 */
	public function isEnabled(): bool
	{
		return $this->isEnabled;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getCreatedAt(): \DateTimeImmutable
	{
		return $this->createdAt;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt(): \DateTime
	{
		return $this->updatedAt;
	}

	/**
	 * @param string $uuid
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 *
	 * @return User
	 */
	public static function register(
		string $uuid,
		string $username,
		string $email,
		string $password
	): self	{
		$user = new self($uuid, $username, $email, $password);

		//$user->apply(new UserWasCreated($id, $username, $email, $password));

		return $user;
	}

	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials()
	{
		return null;
	}

	/**
	 * Returns the salt that was originally used to encode the password.
	 *
	 * This can return null if the password was not encoded using a salt.
	 *
	 * @return string|null The salt
	 */
	public function getSalt()
	{
		return null;
	}

	/**
	 * String representation of object
	 * @link http://php.net/manual/en/serializable.serialize.php
	 * @return string the string representation of the object or null
	 * @since 5.1.0
	 */
	public function serialize()
	{
		return serialize([
			$this->uuid,
			$this->username,
			$this->password,
			$this->isEnabled
		]);
	}

	/**
	 * Constructs the object
	 * @link http://php.net/manual/en/serializable.unserialize.php
	 *
	 * @param string $serialized <p>
	 * The string representation of the object.
	 * </p>
	 *
	 * @return void
	 * @since 5.1.0
	 */
	public function unserialize($serialized)
	{
		list (
			$this->uuid,
			$this->username,
			$this->email,
			$this->isEnabled
			) = unserialize($serialized);
	}

	/**
	 * @param $encodePassword
	 */
	public function encodedPassword($encodePassword)
	{
		$this->password = $encodePassword;
	}
}