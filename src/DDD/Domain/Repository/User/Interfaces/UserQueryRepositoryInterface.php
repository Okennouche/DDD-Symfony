<?php

declare(strict_types=1);

/**
 *
 * @ created on 23/12/18 00:57
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Repository\User\Interfaces;

use App\DDD\Domain\Entity\User\User;


/**
 * Interface UserQueryRepositoryInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface UserQueryRepositoryInterface
{
	/**
	 * @param string $email
	 *
	 * @return User|null
	 */
	public function findOneByEmail(string $email): ?User;

	/**
	 * @param $usernameOrEmail
	 *
	 * @return User|null
	 */
	public function loadUserByUsername($usernameOrEmail): ?User;
}