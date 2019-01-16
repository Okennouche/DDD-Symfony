<?php

declare(strict_types=1);

/**
 *
 * @ Created on 29/12/18 11:23
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Event\User;

use App\DDD\Shared\Uuid\Uuid;
use App\DDD\Domain\Entity\User\User;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Domain\Event\User\Interfaces\UserWasCreatedInterface;

/**
 * Class UserWasCreated
 *
 * @package App\DDD\Domain\Event\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserWasCreated implements UserWasCreatedInterface
{
	/**
	 * @var Uuid $uuid
	 */
	protected $uuid;

	/**
	 * @var string $username
	 */
	protected $username;

	/**
	 * @var string $email
	 */
	protected $email;

	/**
	 * @var string $password
	 */
	protected $password;

	/**
	 * @var array $roles
	 */
	protected $roles;

	/***
	 * @var bool $isActive
	 */
	protected $isActive;

	/**
	 * @var string $createdAt
	 */
	protected $createdAt;

	/**
	 * @inheritdoc
	 */
	public function __construct(User $user) {
		$this->uuid = $user->getUuid();
		$this->username = $user->getUsername();
		$this->email = $user->getEmail();
		$this->password = $user->getPassword();
		$this->roles = $user->getRoles();
		$this->isActive = $user->isActive();
		$this->createdAt = $user->getCreatedAt();
	}

	/**
	 * @inheritdoc
	 */
	public function getAggregateId(): AggregateIdInterface
	{
		return $this->uuid;
	}

	/**
	 * @inheritdoc
	 */
	public function getUsername(): string
	{
		return $this->username;
	}

	/**
	 * @inheritdoc
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @inheritdoc
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @inheritdoc
	 */
	public function getRoles(): array
	{
		return $this->roles;
	}

	/**
	 * @inheritdoc
	 */
	public function isActive(): bool
	{
		return $this->isActive;
	}

	/**
	 * @inheritdoc
	 */
	public function getCreatedAt(): \DateTimeImmutable
	{
		return $this->createdAt;
	}

	/**
	 * @return array
	 */
	public function arrayFromDataStore(): array
	{
		return [
			':uuid' => (string) $this->getAggregateId(),
			':username' => $this->username,
			':email' => $this->email,
			':password_encoded' => $this->password,
			':roles' => json_encode($this->roles),
			':is_active' => intval($this->isActive),
			':created_at' => $this->createdAt->format('Y-m-d H:i:s'),
		];
	}
}