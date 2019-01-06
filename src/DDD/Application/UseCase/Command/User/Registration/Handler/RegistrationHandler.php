<?php

declare(strict_types=1);

/**
 *
 * @ created on 28/12/18 05:15
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Handler;

use App\DDD\Domain\Entity\User\User;
use App\DDD\Infrastructure\User\Repository\UserQueryRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\RegistrationCommandInterface;
use App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces\RegistrationHandlerInterface;

/**
 * Class RegistrationHandler
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration\Handler
 */
final class RegistrationHandler implements RegistrationHandlerInterface
{
	/**
	 * @var $userRepository UserQueryRepository
	 */
	private $userRepository;

	/**
	 * @var $encoder UserPasswordEncoderInterface
	 */
	private $encoder;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		UserCommandRepositoryInterface $repository,
		UserPasswordEncoderInterface $encoder
	) {
		$this->userRepository = $repository;
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
			$command->getPassword()
		);

		$user->encodedPassword(
			$this->encoder->encodePassword(
				$user, $user->getPassword()
			)
		);

		$this->userRepository->store($user);
	}
}