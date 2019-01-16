<?php

declare(strict_types=1);

/**
 *
 * @ Created on 16/01/2019 11:37
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Event\User;

use App\DDD\Shared\Uuid\Uuid;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;
use App\DDD\Domain\Event\User\Interfaces\UserEmailWasChangedInterface;

/**
 * Class UserEmailWasChanged
 *
 * @package App\DDD\Domain\Event\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserEmailWasChanged implements UserEmailWasChangedInterface
{
	/**
	 * @var Uuid $uuid
	 */
	protected $uuid;
	/**
	 * @inheritdoc
	 */
	public function getAggregateId(): AggregateIdInterface
	{
		return $this->uuid;
	}
}