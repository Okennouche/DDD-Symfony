<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 16:57
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Repository\Interfaces;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Shared\RecordsEvents\Interfaces\RecordsEventsInterface;


/**
 * Interface AggregateRepositoryInterface
 *
 * @package App\DDD\Shared\Repository\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface AggregateRepositoryInterface
{
	/**
	 * @param RecordsEventsInterface $aggregate
	 *
	 * @return mixed
	 */
	public function addEvents(RecordsEventsInterface $aggregate);

	/**
	 * @param AggregateIdInterface $aggregateId
	 *
	 * @return RecordsEventsInterface
	 */
	public function getEvents(AggregateIdInterface $aggregateId): RecordsEventsInterface;
}