<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/2019 16:32
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\AddTokenForAccountValidationCommandInterface;


/**
 * Interface AddTokenForAccountValidationCommandHandlerInterface
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface AddTokenForAccountValidationCommandHandlerInterface extends MessageHandlerInterface
{
	/**
	 * AddTokenForAccountValidationCommandHandlerInterface constructor.
	 *
	 * @param UserCommandRepositoryInterface $commandRepository
	 */
	public function __construct(UserCommandRepositoryInterface $commandRepository);

	/**
	 * @param AddTokenForAccountValidationCommandInterface $command
	 *
	 * @return mixed
	 */
	public function __invoke(AddTokenForAccountValidationCommandInterface $command): void;

}