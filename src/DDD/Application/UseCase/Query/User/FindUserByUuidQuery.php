<?php

declare(strict_types=1);

/**
 *
 * @ Created on 17/01/19 14:45
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User;

use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Application\UseCase\Query\User\Interfaces\FindUserByUuidQueryInterface;


/**
 * Class FindUserByUuidQuery
 *
 * @package App\DDD\Application\UseCase\Query\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class FindUserByUuidQuery implements FindUserByUuidQueryInterface
{
	/**
	 * @var AggregateIdInterface
	 */
	private $aggregatId;

	/**
	 * @inheritdoc
	 */
	public function __construct(AggregateIdInterface $aggregateId)
	{
		$this->aggregatId = $aggregateId;
	}

	/**
	 * @return AggregateIdInterface
	 */
	public function getAggregatId(): AggregateIdInterface
	{
		return $this->aggregatId;
	}
}