<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/19 18:44
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Persistence;

use App\DDD\Shared\Uuid\Uuid;
use Doctrine\DBAL\Connection;
use App\DDD\Domain\Entity\Events\Events;
use App\DDD\Shared\DomainEvents\DomainEvents;
use App\DDD\Shared\ClassNameHelper\ClassNameHelper;
use App\DDD\Shared\DomainEventsHistory\DomainEventsHistory;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\DomainEvent\Interfaces\DomainEventInterface;
use App\DDD\Shared\Serializer\Interfaces\PayloadSerializerInterface;
use App\DDD\Infrastructure\User\Persistence\Interfaces\MySQLEventStoreInterface;


/**
 * Class MySQLEventStore
 *
 * @package App\DDD\Infrastructure\User\Persistence
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class MySQLEventStore implements MySQLEventStoreInterface
{
	const TABLE_NAME = 'ddd_events';

	/**
	 * @var Connection $connection
	 */
	protected $connection;

	/**
	 * @var PayloadSerializerInterface $serializerPayload
	 */
	private $serializerPayload;

	/**
	 * MySQLEventStore constructor.
	 *
	 * @param Connection                 $connection
	 * @param PayloadSerializerInterface $payloadSerializer
	 */
	public function __construct(
		Connection $connection,
		PayloadSerializerInterface $payloadSerializer
	) {
		$this->connection = $connection;
		$this->serializerPayload = $payloadSerializer;
	}

	/**
	 * @inheritdoc
	 */
	public function appendEvents(DomainEvents $events)
	{
		$request = $this->connection->prepare(
			sprintf('INSERT INTO %s (`uuid`, `aggregate_id`, `event_name`, `payload`, `created_at`) VALUES (:uuid, :aggregateId, :eventName, :payload, :createdAt)', static::TABLE_NAME)
		);

		/** @var DomainEventInterface $event */
		foreach ($events as $event) {

			$newEvent = new Events(
				Uuid::generate(),
				$event->getAggregateId(),
				ClassNameHelper::getShortClassName(get_class($event)),
				$this->serializerPayload->serialize($event, 'json')
			);

			$request->execute($newEvent->arrayFromData());
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getEvents(AggregateIdInterface $aggregateId): DomainEventsHistory
	{

		$query = $this->connection->prepare(sprintf('SELECT * FROM %s WHERE aggregate_id=:aggregateId', static::TABLE_NAME));
		$query->execute([':aggregateId' => (string) $aggregateId]);

		$events = [];

		while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			$events[] = $this->serializerPayload->deserialize($row['payload'], $row['event_name'], 'json');
		}

		$query->closeCursor();

		return new DomainEventsHistory($aggregateId, $events);
	}
}