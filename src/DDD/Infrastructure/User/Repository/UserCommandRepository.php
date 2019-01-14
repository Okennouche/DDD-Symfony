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
use App\DDD\Domain\Projection\Interfaces\UserProjectionInterface;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\EventStore\Interfaces\EventStoreInterface;
use App\DDD\Shared\RecordsEvents\Interfaces\RecordsEventsInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;

/**
 * Class UserCommandRepository
 *
 * @package App\DDD\Infrastructure\User\Repository
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserCommandRepository extends ServiceEntityRepository implements UserCommandRepositoryInterface
{
	/**
	 * @var EventStoreInterface
	 */
	private $eventStore;
	/**
	 * @var UserProjectionInterface
	 */
	private $projection;

	/**
	 * UserCommandRepository constructor.
	 *
	 * @param RegistryInterface       $registry
	 * @param EventStoreInterface     $eventStore
	 * @param UserProjectionInterface $projection
	 */
	public function __construct(
		RegistryInterface $registry,
		EventStoreInterface $eventStore,
		UserProjectionInterface $projection
	) {
		parent::__construct($registry, User::class);
		$this->eventStore = $eventStore;
		$this->projection = $projection;
	}

	/**
	 * @inheritdoc
	 */
	public function store(User $user): void
	{
		$this->_em->persist($user);
		$this->_em->flush();
	}

	/**
	 * @param RecordsEventsInterface $aggregate
	 *
	 * @return mixed
	 */
	public function add(RecordsEventsInterface $aggregate)
	{
		$recordedEvents = $aggregate->getRecordedEvents();
		$this->eventStore->append($recordedEvents);
		$this->projection->project($recordedEvents);
		$aggregate->clearRecordedEvents();
	}

	/**
	 * @param AggregateIdInterface $id
	 *
	 * @return RecordsEventsInterface
	 */
	public function get(AggregateIdInterface $id): RecordsEventsInterface
	{
		$events = $this->eventStore->get($id);
		return User::reconstituteFromHistory($events);
	}
}