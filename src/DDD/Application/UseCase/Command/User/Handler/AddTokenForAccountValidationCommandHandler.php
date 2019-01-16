<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/2019 16:31
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Handler;

use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Interfaces\AddTokenForAccountValidationCommandInterface;
use App\DDD\Application\UseCase\Command\User\Handler\Interfaces\AddTokenForAccountValidationCommandHandlerInterface;

/**
 * Class AddTokenForAccountValidationCommandHandler
 *
 * @package App\DDD\Application\UseCase\Command\User\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class AddTokenForAccountValidationCommandHandler implements AddTokenForAccountValidationCommandHandlerInterface
{

	/**
	 * @var $userCommandRepository UserCommandRepositoryInterface
	 */
	private $userCommandRepository;

	/**
	 * AddTokenForAccountValidationCommandHandlerInterface constructor.
	 *
	 * @param UserCommandRepositoryInterface $commandRepository
	 */
	public function __construct(UserCommandRepositoryInterface $commandRepository)
	{
		$this->userCommandRepository = $commandRepository;
	}

	/**
	 * @param AddTokenForAccountValidationCommandInterface $command
	 *
	 * @return mixed
	 */
	public function __invoke(AddTokenForAccountValidationCommandInterface $command): void
	{
		// TODO: Implement __invoke() method.
	}
}