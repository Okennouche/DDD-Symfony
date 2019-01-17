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

namespace App\DDD\Application\UseCase\Query\User\Handler;

use Symfony\Component\Security\Core\User\UserInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Application\UseCase\Query\User\Interfaces\FindUserByUuidQueryInterface;
use App\DDD\Application\UseCase\Query\User\Handler\Interfaces\FindUserByUuidQueryHandlerInterface;

/**
 * Class FindUserByUuidQueryHandler
 *
 * @package App\DDD\Application\UseCase\Query\User\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class FindUserByUuidQueryHandler implements FindUserByUuidQueryHandlerInterface
{
	/**
	 * @var UserQueryRepositoryInterface
	 */
	private $queryRepository;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		UserQueryRepositoryInterface $queryRepository
	) {
		$this->queryRepository = $queryRepository;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(FindUserByUuidQueryInterface $query): ?UserInterface
	{
		return $this->queryRepository->findByUuid((string) $query->getAggregatId());
	}
}