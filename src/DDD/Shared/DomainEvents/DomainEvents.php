<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:21
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\DomainEvents;


/**
 * Class DomainEvents
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class DomainEvents implements \IteratorAggregate
{
	/**
	 * @var array
	 */
	private $events = [];

	/**
	 * @param array $events
	 */
	public function __construct(array $events)
	{
		$this->events = $events;
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->events);
	}
}