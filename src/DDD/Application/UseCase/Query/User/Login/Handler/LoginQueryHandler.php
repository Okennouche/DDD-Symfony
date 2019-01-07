<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 22:45
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Login\Handler;

use App\DDD\Security\Encoder\Interfaces\EncoderInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Application\UseCase\Query\User\Login\Interfaces\LoginQueryInterface;
use App\DDD\Application\UseCase\Query\User\Login\Handler\Interfaces\LoginQueryHandlerInterface;


/**
 * class LoginQueryHandler
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
final class LoginQueryHandler implements LoginQueryHandlerInterface
{
	/**
	 * @var $userRepository UserQueryRepositoryInterface
	 */
	private $userRepository;

	/**
	 * @var $encoder EncoderInterface
	 */
	private $encoder;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		UserQueryRepositoryInterface $repository,
		EncoderInterface $encoder
	) {

		$this->userRepository = $repository;
		$this->encoder = $encoder;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(LoginQueryInterface $query)
	{
		$user = $this->userRepository->findOneByEmail($query->getEmail());

		if(!$user) {
			var_dump('not found');
		}

		if($this->encoder->isPasswordValid($user->getPassword(), $query->getPlainPassword(), null)) {


		}
	}
}