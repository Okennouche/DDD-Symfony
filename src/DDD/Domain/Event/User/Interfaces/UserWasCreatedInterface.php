<?php

declare(strict_types=1);

/**
 *
 * @ created on 29/12/18 11:22
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Event\User\Interfaces;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\Uuid\Uuid;
use App\DDD\Shared\DomainEvent\Interfaces\DomainEventInterface;

/**
 * Interface UserWasCreatedInterface
 *
 * @package App\DDD\Domain\Event\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface UserWasCreatedInterface extends DomainEventInterface
{
	/**
	 * UserWasCreatedInterface constructor.
	 *
	 * @param Uuid $uuid
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 * @param string $token
	 */
	public function __construct(Uuid $uuid, string $username, string $email, string $password, string $token);

	/**
	 * @return AggregateIdInterface
	 */
	public function getAggregateId(): AggregateIdInterface;

	/**
	 * @return string
	 */
	public function getUsername(): string;

	/**
	 * @return string
	 */
	public function getEmail(): string;

	/**
	 * @return string
	 */
	public function getPassword(): string;

	/**
	 * @return string
	 */
	public function getToken():string;
}