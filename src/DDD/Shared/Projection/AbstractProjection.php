<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 17:02
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Projection;

use Doctrine\DBAL\Connection;
use App\DDD\Shared\DomainEvents\DomainEvents;
use App\DDD\Shared\ClassNameHelper\ClassNameHelper;
use App\DDD\Shared\Projection\Interfaces\ProjectionInterface;

/**
 * Class AbstractProjection
 *
 * @package App\DDD\Shared\Projection
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
abstract class AbstractProjection implements ProjectionInterface
{
	/**
	 * @var Connection
	 */
	protected $connection;

	/**
	 * @param $connection
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @inheritdoc
	 */
	public function project(DomainEvents $events)
	{
		foreach ($events as $event) {
			$method = 'projectWhen' . ClassNameHelper::getShortClassName(get_class($event));
			$this->$method($event);
		}
	}
}