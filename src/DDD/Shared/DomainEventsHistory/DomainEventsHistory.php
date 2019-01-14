<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:32
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\DomainEventsHistory;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\DomainEvent\Interfaces\DomainEventInterface;
use App\DDD\Shared\DomainEvents\DomainEvents;

/**
 * Class DomainEventsHistory
 *
 * @package App\DDD\Shared\DomainEventsHistory
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class DomainEventsHistory extends DomainEvents
{
	/**
	 * @var AggregateIdInterface
	 */
	private $aggregateId;

	/**
	 * @param AggregateIdInterface   $aggregateId
	 * @param DomainEventInterface[] $events
	 */
	public function __construct(AggregateIdInterface $aggregateId, $events)
	{
		$this->aggregateId = $aggregateId;
		parent::__construct($events);
	}

	/**
	 * @return AggregateIdInterface
	 */
	public function getAggregateId(): AggregateIdInterface
	{
		return $this->aggregateId;
	}
}