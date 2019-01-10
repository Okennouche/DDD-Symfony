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

namespace App\DDD\Application\UseCase\Query\User\FindByEmail\Handler;

use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Application\UseCase\Query\User\FindByEmail\Interfaces\EmailExistQueryInterface;
use App\DDD\Application\UseCase\Query\User\FindByEmail\Handler\Interfaces\EmailExistQueryHandlerInterface;

/**
 * Class EmailExistQueryQueryHandler
 *
 * @package App\DDD\Application\UseCase\Query\User\FindByEmail\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class EmailExistQueryQueryHandler implements EmailExistQueryHandlerInterface
{
	/**
	 * @var $queryRepository UserQueryRepositoryInterface
	 */
	private $queryRepository;

	/**
	 * @inheritdoc
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository)
	{
		$this->queryRepository = $queryRepository;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(EmailExistQueryInterface $query)
	{
		if ($this->queryRepository->existsEmail($query->getEmail())) {
			throw new EmailAlreadyExistException('This email already registered');
		}
	}
}