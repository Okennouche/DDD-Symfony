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

use App\DDD\Domain\Entity\User\User;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
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
	 * @param User $user
	 */
	public function __construct(User $user);

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
	 * @return array
	 */
	public function getRoles(): array;

	/**
	 * @return bool
	 */
	public function isActive(): bool;

	/**
	 * @return \DateTimeImmutable
	 */
	public function getCreatedAt(): \DateTimeImmutable;
}