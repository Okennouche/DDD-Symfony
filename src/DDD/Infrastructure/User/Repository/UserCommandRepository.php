<?php

declare(strict_types=1);

/**
 *
 * @ created on 04/01/19 06:56
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Repository;

use App\DDD\Domain\Entity\User\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * class UserCommandRepository
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class UserCommandRepository extends ServiceEntityRepository implements UserCommandRepositoryInterface, UserLoaderInterface
{

	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, User::class);
	}

	/**
	 * @inheritdoc
	 */
	public function store(User $user): void
	{
		$this->_em->persist($user);
		$this->_em->flush();
	}

	/**
	 * Loads the user for the given username.
	 *
	 * This method must return null if the user is not found.
	 *
	 * @param string $username The username
	 *
	 * @return UserInterface|null
	 */
	public function loadUserByUsername($username)
	{
		return $this->createQueryBuilder('u')
			->where('u.username = :username OR u.email = :email')
			->setParameter('username', $username)
			->setParameter('email', $username)
			->getQuery()
			->getOneOrNullResult();
	}
}