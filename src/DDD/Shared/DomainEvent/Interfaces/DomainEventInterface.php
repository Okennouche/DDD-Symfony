<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:28
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\DomainEvent\Interfaces;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;

/**
 * Interface DomainEvent
 *
 * @package App\DDD\Shared\DomainEvent\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface DomainEventInterface
{
	/**
	 * @return AggregateIdInterface
	 */
	public function getAggregateId(): AggregateIdInterface;
}