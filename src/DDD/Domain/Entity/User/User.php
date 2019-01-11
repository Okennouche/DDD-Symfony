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
	private $isActive;

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
		$this->roles = ['ROLE_USER'];
		$this->isActive = false;
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
	 * @inheritdoc
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @return array
	 */
	public function getRoles(): array
	{
		return array_unique($this->roles);
	}

	/**
	 * @return string
	 */
	public function getConfirmationToken(): string
	{
		return $this->confirmationToken;
	}

	/**
	 * @return bool
	 */
	public function isActive(): bool
	{
		return $this->isActive;
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
	 * @inheritdoc
	 */
	public function eraseCredentials(){}

	/**
	 * @inheritdoc
	 */
	public function getSalt(){}

	/**
	 * @inheritdoc
	 */
	public function serialize()
	{
		return serialize(array(
			$this->uuid,
			$this->username,
			$this->password,
			$this->isActive,
		));
	}

	/**
	 * @inheritdoc
	 */
	public function unserialize($serialized)
	{
		list (
			$this->uuid,
			$this->username,
			$this->password,
			$this->isActive,
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