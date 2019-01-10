<?php

declare(strict_types=1);

/**
 *
 * @ Created on 04/01/19 06:56
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Repository;

use App\DDD\Domain\Entity\User\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;

/**
 * Class UserCommandRepository
 *
 * @package App\DDD\Infrastructure\User\Repository
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserCommandRepository extends ServiceEntityRepository implements UserCommandRepositoryInterface
{
	/**
	 * UserCommandRepository constructor.
	 *
	 * @param RegistryInterface $registry
	 */
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
}