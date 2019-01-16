<?php

declare(strict_types=1);

/**
 *
 * @ Created on 04/01/19 06:56
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Repository;

use App\DDD\Domain\Entity\User\User;
use App\DDD\Shared\Projection\Interfaces\ProjectionInterface;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\EventStore\Interfaces\EventStoreInterface;
use App\DDD\Shared\RecordsEvents\Interfaces\RecordsEventsInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;

/**
 * Class UserCommandRepository
 *
 * @package App\DDD\Infrastructure\User\Repository
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserCommandRepository implements UserCommandRepositoryInterface
{
	/**
	 * @var EventStoreInterface
	 */
	private $eventStore;

	/**
	 * @var ProjectionInterface
	 */
	private $projection;

	/**
	 * UserCommandRepository constructor.
	 *
	 * @param EventStoreInterface $eventStore
	 * @param ProjectionInterface $projection
	 */
	public function __construct(
		EventStoreInterface $eventStore,
		ProjectionInterface $projection
	) {
		$this->eventStore = $eventStore;
		$this->projection = $projection;
	}
	/**
	 * @inheritdoc
	 */
	public function addEvents(RecordsEventsInterface $aggregate)
	{
		$recordedEvents = $aggregate->getRecordedEvents();

		$this->projection->project($recordedEvents);
		$this->eventStore->appendEvents($recordedEvents);

		$aggregate->clearRecordedEvents();
	}

	/**
	 * @inheritdoc
	 */
	public function getEvents(AggregateIdInterface $aggregateId): RecordsEventsInterface
	{
		$events = $this->eventStore->getEvents($aggregateId);

		return User::reconstituteFromHistory($events);
	}
}