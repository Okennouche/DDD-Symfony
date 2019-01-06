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
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;


/**
 * class UserQueryRepository
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class UserQueryRepository extends ServiceEntityRepository implements UserQueryRepositoryInterface
{

	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, User::class);
	}

	/**
	 * @param string $email
	 *
	 * @return User|null
	 */
	public function findOneByEmail(string $email): ?User
	{
		return $this->createQueryBuilder('user')
					->where('user.email = :email')
					->setParameter('email', $email)
					->getQuery()
		            ->useResultCache(true, null, 'user.findByEmail'. $email)
					->getOneOrNullResult()
			;
	}
}