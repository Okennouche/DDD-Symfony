<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/19 20:11
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Entity\Events;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\Uuid\Uuid;

/**
 * Class Events
 *
 * @package App\DDD\Domain\Entity\Events
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Events
{
	/**
	 * @var Uuid $uuid
	 */
	private $uuid;

	/**
	 * @var AggregateIdInterface $aggregateId
	 */
	private $aggregateId;

	/**
	 * @var string $eventName
	 */
	private $eventName;

	/**
	 * @var string $payload
	 */
	private $payload;

	/**
	 * @var \DateTimeImmutable
	 */
	private $createdAt;

	/**
	 * Events constructor.
	 *
	 * @param Uuid                 $uuid
	 * @param AggregateIdInterface $aggregateId
	 * @param string               $eventName
	 * @param string               $payload
	 */
	public function __construct(
		Uuid $uuid,
		AggregateIdInterface $aggregateId,
		string $eventName,
		string $payload
	) {
		$this->uuid = $uuid;
		$this->aggregateId = $aggregateId;
		$this->eventName = $eventName;
		$this->payload = $payload;
		$this->createdAt = new \DateTimeImmutable();
	}

	/**
	 * @return array
	 */
	public function arrayFromData(): array
	{
		return [
			':uuid' => $this->uuid->__toString(),
			':aggregateId' => $this->aggregateId->__toString(),
			':eventName' => $this->eventName,
			':payload' => $this->payload,
			':createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
		];
	}
}