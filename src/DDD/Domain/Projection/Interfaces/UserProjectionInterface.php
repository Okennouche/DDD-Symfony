<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/19 19:05
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Projection\Interfaces;

use App\DDD\Domain\Event\User\UserWasCreated;
use App\DDD\Shared\Projection\Interfaces\ProjectionInterface;


/**
 * Interface UserProjectionInterface
 *
 * @package App\DDD\Domain\Projection\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface UserProjectionInterface extends ProjectionInterface
{
	/**
	 * @param UserWasCreated $event
	 *
	 * @return mixed
	 */
	public function projectWhenUserWasCreated(UserWasCreated $event);
}