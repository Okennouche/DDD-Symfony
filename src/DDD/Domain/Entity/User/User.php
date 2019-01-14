<?php

declare(strict_types=1);

/**
 *
 * @ Created on 27/12/18 19:11
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Entity\User;

use App\DDD\Domain\Event\User\UserWasCreated;
use App\DDD\Shared\Aggregate\AggregateRoot;
use App\DDD\Shared\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;
use App\DDD\Shared\DomainEventsHistory\DomainEventsHistory;

/**
 * Class User
 *
 * @package App\DDD\Domain\Entity\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class User extends AggregateRoot implements UserInterface, \Serializable
{
	/**
	 * @var Uuid
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
	 * @param Uuid $uuid
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 * @param string $token
	 */
	public function __construct(
		Uuid $uuid,
		string $username,
		string $email,
		string $password,
		string $token
	) {
		$this->uuid = $uuid;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->roles = ['ROLE_USER'];
		$this->confirmationToken = $token;
		$this->isActive = false;
		$this->createdAt = new \DateTimeImmutable();
	}

	/**
	 * @return string
	 */
	public function getUuid()
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
	 * @param Uuid $uuid
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 * @param string $token
	 *
	 * @return User
	 */
	public static function register(
		Uuid $uuid,
		string $username,
		string $email,
		string $password,
		string  $token
	): self	{
		$user = new self($uuid, $username, $email, $password, $token);

		$user->recordThat(new UserWasCreated($uuid, $username, $email, $password, $token));

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
	 * @param DomainEventsHistory $eventsHistory
	 *
	 * @return mixed
	 */
	public static function reconstituteFromHistory(DomainEventsHistory $eventsHistory)
	{
		return;
	}
}