<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/2019 15:42
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\FindByEmail\Handler\Interfaces;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Application\UseCase\Query\User\FindByEmail\Interfaces\EmailExistQueryInterface;

/**
 * Interface EmailExistQueryHandlerInterface
 *
 * @package App\DDD\Application\UseCase\Query\User\FindByEmail\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface EmailExistQueryHandlerInterface extends MessageHandlerInterface
{
	/**
	 * EmailExistQueryHandlerInterface constructor.
	 *
	 * @param UserQueryRepositoryInterface $queryRepository
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository);

	/**
	 * @param EmailExistQueryInterface $query
	 *
	 * @return mixed
	 */
	public function __invoke(EmailExistQueryInterface $query);
}