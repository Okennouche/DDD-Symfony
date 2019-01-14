<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 15:26
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\RecordsEvents\Interfaces;

use App\DDD\Shared\DomainEvents\DomainEvents;

/**
 * Interface RecordsEventsInterface
 *
 * @package App\DDD\Shared\RecordsEvents\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface RecordsEventsInterface
{
	/**
	 * @return DomainEvents
	 */
	public function getRecordedEvents(): DomainEvents;

	/**
	 * @return mixed
	 */
	public function clearRecordedEvents();
}