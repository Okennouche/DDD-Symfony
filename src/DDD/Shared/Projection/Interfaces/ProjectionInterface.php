<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 17:00
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Projection\Interfaces;

use App\DDD\Shared\DomainEvents\DomainEvents;

/**
 * Interface ProjectionInterface
 *
 * @package App\DDD\Shared\Projection\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface ProjectionInterface
{
	/**
	 * @param DomainEvents $events
	 *
	 * @return mixed
	 */
	public function project(DomainEvents $events);
}