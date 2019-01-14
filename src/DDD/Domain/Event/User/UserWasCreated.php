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

use App\DDD\Domain\Event\User\Interfaces\UserWasCreatedInterface;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\Uuid\Uuid;

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
	 * @var string $token
	 */
	protected $token;

	/**
	 * @inheritdoc
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
		$this->token = $token;
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
	public function getUuid(): Uuid
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
	public function getToken(): string
	{
		return $this->token;
	}
}