<?php

declare(strict_types=1);

/**
 *
 * @ Created on 28/12/18 05:15
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Handler;

use App\DDD\Domain\Entity\User\User;
use App\DDD\Security\User\Encoder\Interfaces\EncoderInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Interfaces\RegistrationCommandInterface;
use App\DDD\Application\UseCase\Command\User\Handler\Interfaces\RegistrationCommandHandlerInterface;

/**
 * Class RegistrationCommandHandler
 *
 * @package App\DDD\Application\UseCase\Command\User\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class RegistrationCommandHandler implements RegistrationCommandHandlerInterface
{
	/**
	 * @var $userCommandRepository UserCommandRepositoryInterface
	 */
	private $userCommandRepository;

	/**
	 * @var $encoder EncoderInterface
	 */
	private $encoder;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		UserCommandRepositoryInterface $commandRepository,
		EncoderInterface $encoder
	) {
		$this->userCommandRepository = $commandRepository;
		$this->encoder = $encoder;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(RegistrationCommandInterface $command)
	{
		$user = User::register(
			$command->getUuid(),
			$command->getUsername(),
			$command->getEmail(),
			$this->encoder->encodePassword($command->getPassword(), null),
			$command->getToken()
		);

		$this->userCommandRepository->addEvents($user);
	}
}