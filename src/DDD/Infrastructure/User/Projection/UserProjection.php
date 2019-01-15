<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/19 18:50
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Projection;

use App\DDD\Domain\Event\User\UserWasCreated;
use App\DDD\Shared\Projection\AbstractProjection;
use App\DDD\Domain\Projection\Interfaces\UserProjectionInterface;

/**
 * Class UserProjection
 *
 * @package App\DDD\Infrastructure\User\Projection
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserProjection extends AbstractProjection implements UserProjectionInterface
{
	/**
	 * @param UserWasCreated $event
	 *
	 * @return mixed
	 */
	public function projectWhenUserWasCreated(UserWasCreated $event)
	{
		return [];
	}
}