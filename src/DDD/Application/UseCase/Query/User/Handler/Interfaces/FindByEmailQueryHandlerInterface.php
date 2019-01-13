<?php

declare(strict_types=1);

/**
 *
 * @ Created on 12/01/19 17:28
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Handler\Interfaces;

use App\DDD\Application\UseCase\Query\User\Interfaces\FindByEmailQueryInterface;
use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;


/**
 * Interface FindByEmailQueryHandlerInterface
 *
 * @package App\DDD\Application\UseCase\Query\User\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface FindByEmailQueryHandlerInterface extends MessageHandlerInterface
{
	/**
	 * FindByEmailQueryHandlerInterface constructor.
	 *
	 * @param UserQueryRepositoryInterface $queryRepository
	 * @param TranslatorInterface          $translator
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository, TranslatorInterface $translator);

	/**
	 * @param FindByEmailQueryInterface $query
	 *
	 * @throws EmailAlreadyExistException
	 * @return null|string
	 */
	public function __invoke(FindByEmailQueryInterface $query): ?string;
}