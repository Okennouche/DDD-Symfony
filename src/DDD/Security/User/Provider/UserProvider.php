<?php

declare(strict_types=1);

/**
 *
 * @ Created on 07/01/2019 14:59
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\Provider;

use App\DDD\Domain\Entity\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;

/**
 * Class UserProvider
 *
 * @package App\DDD\Security\User\Provider
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserProvider implements UserProviderInterface
{
	/**
	 * @var UserQueryRepositoryInterface
	 */
	private $queryRepository;

	/**
	 * UserProvider constructor.
	 *
	 * @param UserQueryRepositoryInterface $queryRepository
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository)
	{
		$this->queryRepository = $queryRepository;
	}

	/**
	 * @inheritdoc
	 */
	public function loadUserByUsername($usernameOrEmail): UserInterface
	{
		$user = $this->queryRepository->loadUserByUsernameOrEmail($usernameOrEmail);

		if(!$user) {
			throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $usernameOrEmail));
		}

		return $user;
	}

	/**
	 * @inheritdoc
	 */
	public function refreshUser(UserInterface $user): UserInterface
	{
		if (!$user instanceof User) {
			throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
		}

		$refreshedUser = $this->queryRepository->findByUuid($user->getUuid());

		if (null === $refreshedUser) {
			throw new UsernameNotFoundException(sprintf('User with uuid %s not found', json_encode($user->getUuid())));
		}

		return $refreshedUser;
	}

	/**
	 * @inheritdoc
	 */
	public function supportsClass($class)
	{
		return User::class === $class;
	}
}