<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:20
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Aggregate;

use App\DDD\Shared\ClassNameHelper\ClassNameHelper;
use App\DDD\Shared\DomainEvents\DomainEvents;
use App\DDD\Shared\DomainEventsHistory\DomainEventsHistory;
use App\DDD\Shared\DomainEvent\Interfaces\DomainEventInterface;
use App\DDD\Shared\RecordsEvents\Interfaces\RecordsEventsInterface;


/**
 * Class AggregateRoot
 *
 * @package App\DDD\Shared\Aggregate
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
abstract class AggregateRoot implements RecordsEventsInterface
{
	/**
	 * @var array|DomainEventInterface[]
	 */
	private $recordedEvents = [];

	/**
	 * @return DomainEvents
	 */
	public function getRecordedEvents(): DomainEvents
	{
		return new DomainEvents($this->recordedEvents);
	}

	/**
	 * @inheritdoc
	 */
	public function clearRecordedEvents()
	{
		$this->recordedEvents = [];
	}

	/**
	 * @param DomainEventInterface $event
	 */
	protected function recordThat(DomainEventInterface $event)
	{
		$this->recordedEvents[] = $event;
	}

	/**
	 * @param DomainEventInterface $event
	 */
	protected function apply(DomainEventInterface $event)
	{
		$method = 'apply' . ClassNameHelper::getShortClassName(get_class($event));
		$this->$method($event);
	}

	/**
	 * @param DomainEventInterface $event
	 */
	protected function applyAndRecordThat(DomainEventInterface $event)
	{
		$this->apply($event);
		$this->recordThat($event);
	}

	/**
	 * @param DomainEventsHistory $eventsHistory
	 *
	 * @return mixed
	 */
	abstract public static function reconstituteFromHistory(DomainEventsHistory $eventsHistory);
}