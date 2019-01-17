<?php

declare(strict_types=1);

/**
 *
 * @ Created on 17/01/19 14:58
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Handler\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Application\UseCase\Query\User\Interfaces\FindUserByUuidQueryInterface;

/**
 * Interface FindUserByUuidQueryHandlerInterface
 *
 * @package App\DDD\Application\UseCase\Query\User\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface FindUserByUuidQueryHandlerInterface extends MessageHandlerInterface
{
	/**
	 * @param FindUserByUuidQueryInterface $query
	 *
	 * @return null|UserInterface
	 */
	public function __invoke(FindUserByUuidQueryInterface $query): ?UserInterface;
}