<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 17:16
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\EventStore\Interfaces;

use App\DDD\Shared\DomainEvents\DomainEvents;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\DomainEventsHistory\DomainEventsHistory;

/**
 * Interface EventStoreInterface
 *
 * @package App\DDD\Shared\EventStore\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface EventStoreInterface
{
	/**
	 * @param DomainEvents $events
	 *
	 * @return mixed
	 */
	public function append(DomainEvents $events);

	/**
	 * @param AggregateIdInterface $aggregateId
	 *
	 * @return DomainEventsHistory
	 */
	public function get(AggregateIdInterface $aggregateId): DomainEventsHistory;
}