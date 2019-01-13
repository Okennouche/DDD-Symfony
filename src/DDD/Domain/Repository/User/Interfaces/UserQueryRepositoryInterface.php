<?php

declare(strict_types=1);

/**
 *
 * @ Created on 23/12/18 00:57
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Repository\User\Interfaces;

use App\DDD\Domain\Entity\User\User;

/**
 * Interface UserQueryRepositoryInterface
 *
 * @package App\DDD\Domain\Repository\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface UserQueryRepositoryInterface
{
	/**
	 * @param string $usernameOrEmail
	 *
	 * @return User|null
	 */
	public function loadUserByUsernameOrEmail(string $usernameOrEmail): ?User;

	/**
	 * @param string $email
	 *
	 * @return mixed
	 */
	public function findByEmail(string $email);

	/**
	 * @param string $uuid
	 *
	 * @return User|null
	 */
	public function findByUuid(string  $uuid): ?User;
}